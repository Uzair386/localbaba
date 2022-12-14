<?php

namespace App\Http\Controllers\work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Goutte\Client;
use Auth;
use App\Category;
use App\Product;
use App\User;
use App\Supplier;
use App\Currency;
use App\Setting;
use Session;
use DataTables;
use Sunra\PhpSimple\HtmlDomParser;
use League\Csv\Writer;

class ProductsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $query = request()->get('query');
      $settings =Setting::first();
      $products = Product::where('parent_id', '=', 0);
      $status = request()->get('status');
      $statuses  = [
          'active' => ['active',1],
          'draft' => ['active',0],
      ];
      if(isset($status) && array_key_exists($status,$statuses)) {
          $products = $products->where($statuses[$status][0], $statuses[$status][1]);
      }
      $vendor = request()->get('vendor');
      if(isset($vendor) && Supplier::find($vendor) != null) {
          $products = $products->where('supplier_id',$vendor);
      }
      if (!empty($query)) {
        $products = $products->where('name','like',  '%' . $query . '%')
                            ->orwhere('price','like',  '%' . $query . '%')
                            ->orwhere('views_count','like',  '%' . $query . '%')
                            ->orwhere('stock','like',  '%' . $query . '%');
      }
      $order = request()->get('order');
      $orders  = [
          'name' => ['name','asc'],
          'stock_h' => ['stock','desc'],
          'stock_l' => ['stock','asc'],
          'price_h' => ['price','desc'],
          'price_l' => ['price','asc'],
      ];
      if(isset($order) && array_key_exists($order,$orders)) {
          $products = $products->orderBy($orders[$order][0], $orders[$order][1]);
      }
      else {
          $products = $products->orderBy('id', 'desc');
      }

      $products = $products->paginate(10);

      // dd($products);
      return view('work.product.index')
      ->with('query',$query)
      ->with('products',$products)
      ->with('settings',$settings)
      ->with('suppliers',Supplier::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::attr(['name' => 'category_id', 'class' => 'form-control show-tick'])
            ->selected(1)
            ->renderAsDropdown();
      return view('work.product.create')
      ->with('suppliers',Supplier::all())
      ->with ('categories',$categories)
      ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $settings = Setting::first();

        $this->validate($request,[
        'name'=>'required',
        'variation_type'=>'required',
        'supplier_id'=>'required',
        'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000', // max 10000kb,
        'price'=>'required|numeric|between:0,999999999999999999999999999.99',
        'stock'=>'required',
        'product_status' => 'required|numeric|between:0,1',
      ]);
      //checks for duplicate slug
      if (Product::where('slug', '=',str_slug($request->name))->exists()) {
            Session::flash('warning','Product Slug Already Exists');
          return redirect()->back();
      }

      //uploads main image
      $randomNum=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 8);
      $image = $request->image;
      $image_new_name=time().$randomNum.$image->getClientOriginalName();
      $image->move('uploads/products/',$image_new_name);
      //uploads Extra Images if Selected
      //ExtraImage1
      if ($request->hasFile('image_ex1')){
        $image_ex1 = $request->image_ex1;
        $image_ex1_new_name ='1'.time().$randomNum.$image_ex1->getClientOriginalName();
        $image_ex1->move('uploads/products/',$image_ex1_new_name);
      }
      //ExtraImage2
      if ($request->hasFile('image_ex2')){
        $image_ex2 = $request->image_ex2;
        $image_ex2_new_name = '2'.time().$randomNum.$image_ex2->getClientOriginalName();
        $image_ex2->move('uploads/products/',$image_ex2_new_name);
      }
      //ExtraImage3
      if ($request->hasFile('image_ex3')){
        $image_ex3 = $request->image_ex3;
        $image_ex3_new_name = '3'.time().$randomNum.$image_ex3->getClientOriginalName();
        $image_ex3->move('uploads/products/',$image_ex3_new_name);
      }
      //ExtraImage4
      if ($request->hasFile('image_ex4')){
        $image_ex4 = $request->image_ex4;
        $image_ex4_new_name = '4'.time().$randomNum.$image_ex4->getClientOriginalName();
        $image_ex4->move('uploads/products/',$image_ex4_new_name);
      }
      //ExtraImage5
      if ($request->hasFile('image_ex5')){
        $image_ex5 = $request->image_ex5;
        $image_ex5_new_name = '5'.time().$randomNum.$image_ex5->getClientOriginalName();
        $image_ex5->move('uploads/products/',$image_ex5_new_name);
      }
      // below tenary operation is for if 
      $image_ex1 = $request->hasFile('image_ex1')?'uploads/products/'.$image_ex1_new_name:'';
      $image_ex2 = $request->hasFile('image_ex2')?'uploads/products/'.$image_ex2_new_name:'';
      $image_ex3 = $request->hasFile('image_ex3')?'uploads/products/'.$image_ex3_new_name:'';
      $image_ex4 = $request->hasFile('image_ex4')?'uploads/products/'.$image_ex4_new_name:'';
      $image_ex5 = $request->hasFile('image_ex5')?'uploads/products/'.$image_ex5_new_name:'';
      //End Extra Images
      

      //calc price_percent_gain
      $percentage_value = ($request->price/100)*$settings->price_percent_gain;//get percentage value
      $new_price = $request->price + $percentage_value;//gets new sale price
      //calc price_percent_gain
      //generating unique ID for instant accessinng of the variant page //Saves pervious resources on queries
      $unique_value = "UNC".time().$randomNum;

      $product = Product::create([
          'name'=>$request->name,
          'description'=>$request->description,
          'category_id'=>$request->category_id,
          'supplier_price'=>$request->price,
          'price'=>$new_price,
          'supplier_id'=>$request->supplier_id,
          'original_url'=>$request->original_url,
          'stock'=>$request->stock,
          'slug'=>str_slug ($request->name),
          'image'=>'uploads/products/'.$image_new_name,
          'image_ex1' => $image_ex1,
          'image_ex2' => $image_ex2,
          'image_ex3' => $image_ex3,
          'image_ex4' => $image_ex4,
          'image_ex5' => $image_ex5,
          'unique_value'=> $unique_value,
          'active'=> $request->product_status,
        ]);
        if ($request->variation_type==1){
          //if single product
          Session::flash('success','Success');
          return redirect()->route('products');
        }elseif($request->variation_type==2){
          // if varied product
          Session::flash('success','Success');
          Session::flash('Add Variations Here','Success');
          return redirect("work/product/$unique_value/variants/");

        }
          

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product=Product::where('parent_id', '=', 0)->find($id);
       //if not found
       if (empty($product)){
        Session::flash('error','Product not found');
      return redirect()->route('products');
    }
      //get selected product category
      $product_category =  $product->category_id;
      $categories = Category::attr(['name' => 'category_id', 'class' => 'form-control show-tick'])
            ->selected($product_category)
            ->renderAsDropdown();
      //get merchant list
      //process image
      $product_image_type= substr( $product->image, 0, 4 ) === "http";
      $product_image     = $product_image_type==1 ? $product->image : asset($product->image);


        return view('work.product.edit')
        ->with('product',$product)
        ->with ('categories',$categories)
        ->with ('product_image',$product_image)//dual function
        ->with('suppliers',Supplier::all());

    ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);
        $this->validate($request,[
        'name'=>'required',
        // 'original_url'=>'required',
        'supplier_id'=>'required',
        'stock'=>'required',
        'price'=>'required|numeric|between:0,999999999999999999999999999.99',
        'supplier_price'=>'required|numeric|between:0,999999999999999999999999999.99',
        'product_status' => 'required|numeric|between:0,1',
      ]);
      //images
      $randomNum=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 6);
      //Main Image 
      if ($request->hasFile('image')){
          if (file_exists($product->image)){
            unlink($product->image);
          }
          $image = $request->image;
          $image_new_name = $randomNum.time().$image->getClientOriginalName();
          $image->move('uploads/products/',$image_new_name);
          $product->image = 'uploads/products/'.$image_new_name;
          // $product->save();
      }
      //Extra Images
      if ($request->hasFile('image_ex1')){
        if (file_exists($product->image_ex1)){
          unlink($product->image_ex1);
        }
        $image_ex1 = $request->image_ex1;
        $image_ex1_new_name = '1'.$randomNum.time().$image_ex1->getClientOriginalName();
        $image_ex1->move('uploads/products/',$image_ex1_new_name);
        $product->image_ex1 = 'uploads/products/'.$image_ex1_new_name;
      }
      if ($request->hasFile('image_ex2')){
        if (file_exists($product->image_ex2)){
          unlink($product->image_ex2);
        }
        $image_ex2 = $request->image_ex2;
        $image_ex2_new_name = '2'.$randomNum.time().$image_ex2->getClientOriginalName();
        $image_ex2->move('uploads/products/',$image_ex2_new_name);
        $product->image_ex2 = 'uploads/products/'.$image_ex2_new_name;
      }
      if ($request->hasFile('image_ex3')){
        if (file_exists($product->image_ex3)){
          unlink($product->image_ex3);
        }
        $image_ex3 = $request->image_ex3;
        $image_ex3_new_name = '3'.$randomNum.time().$image_ex3->getClientOriginalName();
        $image_ex3->move('uploads/products/',$image_ex3_new_name);
        $product->image_ex3 = 'uploads/products/'.$image_ex3_new_name;
      }
      if ($request->hasFile('image_ex4')){
        if (file_exists($product->image_ex4)){
          unlink($product->image_ex4);
        }
        $image_ex4 = $request->image_ex4;
        $image_ex4_new_name = '4'.$randomNum.time().$image_ex4->getClientOriginalName();
        $image_ex4->move('uploads/products/',$image_ex4_new_name);
        $product->image_ex4 = 'uploads/products/'.$image_ex4_new_name;
      }
      if ($request->hasFile('image_ex5')){
        if (file_exists($product->image_ex5)){
          unlink($product->image_ex5);
        }
        $image_ex5 = $request->image_ex5;
        $image_ex5_new_name = '5'.$randomNum.time().$image_ex5->getClientOriginalName();
        $image_ex5->move('uploads/products/',$image_ex5_new_name);
        $product->image_ex5 = 'uploads/products/'.$image_ex5_new_name;
      }
      $product->name           = $request->name;
      $product->description    = $request->description;
      $product->category_id    = $request->category_id;
      $product->price          = $request->price;
      $product->supplier_price = $request->supplier_price;
      $product->stock          = $request->stock;
      $product->supplier_id    = $request->supplier_id;
      $product->original_url   = $request->original_url;
      $product->active   = $request->product_status;
      $product->save();
      Session::flash('success','Successfully Updated');
      return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_product($id){
      error_reporting(0);
      ini_set('max_execution_time', 300);
      $settings =Setting::first();
      // get product info

      $product = Product::find($id);
      // dd($product->user_id);
      if (empty($product->supplier_id)){
        Session::flash('warning', "Product's supplier is Unknown");
        return redirect()->back();
      }

      if (empty($product->original_url)){
        Session::flash('warning', "Product's Original url is Empty");
        return redirect()->back();
      }

// get merchant info
$product_supplier = Supplier::where('id',$product->supplier_id)->first();

if (empty($product_supplier->price_update_block || $product_supplier->price_update_element)){
  Session::flash('warning', "Price Update Block OR Price Update Element is Empty");
  return redirect()->back();
}
$product_url ="$product->original_url";
// $product_block_ini ="$product_supplier->price_update_block";
$product_price_element = "$product_supplier->price_update_element";
$product_stock_element = "$product_supplier->stock_update_element";
$product_description_element = "$product_supplier->description_update_element";

$client = new Client();
$client->setHeader("user-agent", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0");
$crawler = $client->request('GET', $product_url);
if (false == ( $crawler = $client->request('GET', $product_url))) {
Session::flash('warning', "Unable to Process URL");
return redirect()->back();
}
if (empty($crawler)){
  Session::flash('warning', "Unable to Contact Link (Empty Crawler)");
  return redirect()->back();
}

if ($crawler->filter($product_price_element)->count() > 0 ) {
  $product_description='';
  $product_price='';
  $product_stock ='';

  $price = $crawler->filter($product_price_element)->text();

  // $price=substr($price, 0, strrpos($price, ' '));
  // $price = current(explode(' ', $price));
  $price = strtok($price, 'to');
  // $price = preg_replace('/[^\p{L}\p{N}\s]/u', '', $price); //removes special charaters
  $price = preg_replace("/[^0-9.]/", "", $price);
  $price = str_replace(',', '', $price);
  $product_price = str_replace(' ', '', $price);

// dump($price." Price.<hr/>");

  //if the new price is empty
  if (empty($product_price)){
    Session::flash('warning', "Err Price is Empty : Check Supplier REGEX");
    return redirect()->back();
  }

  $ebay_product_url = substr( $product->original_url, 0, 20 ) === "https://www.ebay.com";
  $ali_product_url  = substr( $product->original_url, 0, 26 ) === "https://www.aliexpress.com";

  if ($crawler->filter($product_stock_element)->count() > 0 ) {//a.vip
      $product_stock = $crawler->filter($product_stock_element)->text();
      $product_stock = str_replace('Last one', 1, $product_stock);
      $product_stock = str_replace('pieces available', '', $product_stock);
      $product_stock = substr($product_stock, 0, strrpos($product_stock, ' '));
      $product_stock = str_replace(' ', '', $product_stock);
      $product_stock = preg_replace("/[^0-9]/", "", $product_stock);
  }elseif($crawler->filter("#isCartBtn_btn")->count() > 0 && $ebay_product_url=1) {//Ebay specific for products not showing Last one or Quantity
        Session::flash('warning',"Stock Moved to (1) because CartButton is active, Check Stock Element ");
        $product_stock = 1;
  }elseif($crawler->filter("#j-add-cart-btn")->count() > 0 && $ali_product_url=1) {//Ali specific products
        $product_stock = 1;
        Session::flash('warning',"Stock Moved to (1) because CartButton is active, Check Stock Element ");
  }else{
    $product_stock = 0;
    Session::flash('warning',"Stock Moved to 0");
  }
  /////////////////////Redundant //////////////////////////////
  if (empty($product_stock)){
    $product_stock = 0;
    Session::flash('warning',"Retuned Empty - Stock Moved to 0");
  }
  if($crawler->filter("#isCartBtn_btn")->count() > 0 && $ebay_product_url=1) {//Ebay specific for products not showing Last one or Quantity
        Session::flash('warning',"Stock Moved to (1) because CartButton is active, Check Stock Element ");
        $product_stock = 1;
  }
  if($crawler->filter("#j-add-cart-btn")->count() > 0 && $ali_product_url=1) {//Ali specific products
        $product_stock = 1;
        Session::flash('warning',"Stock Moved to (1) because CartButton is active, Check Stock Element ");
  }
/////////////////////////////////////////////////////////////

  if ($crawler->filter($product_description_element)->count() > 0 ) {//a.vip
      $product_description = $crawler->filter($product_description_element)->html();
  }


  // if description has value
  if (!empty($product_description)){
    $product->description = $product_description;
    Session::flash('info',"Updated Description");
  }

  // dd('here');
  if (!empty($product_price)){
    //gain calculation
    $percentage_value = ($product_price/100)*$settings->price_percent_gain;//get percentage value
    $new_price = $product_price + $percentage_value;//gets new sale price
    //save
    $product->supplier_price = $product_price;
    $product->price = $new_price;
    $product->stock = $product_stock;
    $product->save();
    Session::flash('success',"Successfully Updated Price ($new_price)");
  }



        // dump($product_stock." Stock.<hr/>");
        // dump($price." Price.<hr/>");
        // // dd("here");
        // dd($product_description);

return redirect()->back();
}else{
  Session::flash('error', "Failed to Update");
  return redirect()->back();
}

}
//////////////////////////////////CSV/////////////////////////////////////
public function import()
{
  //shows files in the imports directory
  $directory    = 'uploads/imports/';
  $path = preg_grep('~\.(csv|gz)$~', scandir($directory));
  $files   = array_diff($path, array('.', '..'));
  ///
  $categories = Category::attr(['required' => 'required','onchange'=>'myFunction(event)', 'name' => 'category_id','id' => 'sel1', 'class' => 'form-control form-control-primary fill'])
      ->selected(1)
      ->renderAsDropdown();
  return view('work.product.import')
  ->with ('files',$files)
  ->with('suppliers',Supplier::all())
  ->with ('categories',$categories);
}

public function csv_upload(Request $request)
{
  $setting =Setting::first();
  ////////////////demo//////////////
if($setting->live_production==0){
    Session::flash('info', 'demo');
    return redirect()->back();
  }
  $target_dir = "uploads/imports/";
    $csv_file = $request->csv_file;
    $csv_file_type = $csv_file->getClientOriginalExtension();
    // $file_new_name = $csv_file->getClientOriginalName();

    if ($csv_file_type == "gz"){
        //import gz data
          $csv_file_new_name = 'import.csv.gz';
          $csv_file->move($target_dir,$csv_file_new_name);
          //extract GZ data
          error_reporting(0);
          $file_name = 'uploads/imports/import.csv.gz';
          // Raising this value may increase performance
          $buffer_size = 4096; // read 4kb at a time
          $out_file_name = str_replace('.gz', '', $file_name);

          // Open our files (in binary mode)
          $file = gzopen($file_name, 'rb');
          if (empty($file)){
            Session::flash('error', "Error (import.csv.gz)File Was Not Found");
            return redirect()->back();
          }
          $out_file = fopen($out_file_name, 'wb');

          // Keep repeating until the end of the input file
          while(!gzeof($file)) {
              // Read buffer-size bytes
              // Both fwrite and gzread and binary-safe
              fwrite($out_file, gzread($file, $buffer_size));
          }

          // Files are done, close files
          fclose($out_file);
          gzclose($file);
          unlink($file_name);//deletes old csv.gz file
          //////////Check Header
          $target_file = 'uploads/imports/import.csv';
    			$requiredHeaders = array('name', 'price','stock', 'description', 'image', 'original_url'); //headers we expect
    			$header_check = fopen($target_file, 'r');
    			$firstLine = fgets($header_check); //get first line of csv file
    			fclose($header_check);
    			$foundHeaders = str_getcsv(trim($firstLine), ',', '"'); //parse to array

          if ($foundHeaders !== $requiredHeaders) {
            Session::flash('error', "File headers do not match");
    			   // print 'Headers do not match: '.implode(', ', $foundHeaders);
    				 unlink($target_file);
             Session::flash('info', "File Deleted, Please Check the sample");
             return redirect()->back();
    			}
          if (($getdata = fopen($target_file, "r")) !== FALSE) {
    			   fgetcsv($getdata);
    			   fclose($getdata);
           Session::flash('success', "Success: File has been Uploaded and Extracted");
           return redirect()->back();
    			}else{
            Session::flash('error', "Upload Error");
            return redirect()->back();
          }
        }

    if ($csv_file_type == "csv"){
          $csv_file_new_name = 'import.csv';
          $csv_file->move($target_dir,$csv_file_new_name);
          $target_file = 'uploads/imports/import.csv';
    			//////////Check Header
    			$requiredHeaders = array('Title', 'Variant Price','Variant Inventory Qty', 'Body (HTML)', 'Image Src', /*'original_url'*/); //headers we expect
    			$header_check = fopen($target_file, 'r');
    			$firstLine = fgets($header_check); //get first line of csv file
    			fclose($header_check);
    			$foundHeaders = str_getcsv(trim($firstLine), ',', '"'); //parse to array

          /*if ($foundHeaders !== $requiredHeaders) {
            Session::flash('error', "File headers do not match");
    			   // print 'Headers do not match: '.implode(', ', $foundHeaders);
    				 unlink($target_file);
             Session::flash('info', "File Deleted, Please Check the sample");
             return redirect()->back();
    			}
          */
          if (($getdata = fopen($target_file, "r")) !== FALSE) {
    			   fgetcsv($getdata);
    			   fclose($getdata);
           Session::flash('success', "Success: File has been Uploaded");
           return redirect()->back();
         }else{
           Session::flash('error', "Upload Error");
           return redirect()->back();
         }

    }else {
      Session::flash('warning', "Invalid: File Type Must be CSV or GZ");
      return redirect()->back();
    }
}

public function csv_export() {
    $products = Product::where('parent_id', '=', 0)->get();

    $header = [
        'Handle', 'Title', 'Body (HTML)','Vendor','Product Category',
        'Type','Tags','Published','Option1 Name','Option1 Value',
        'Option2 Name','Option2 Value','Option3 Name','Option3 Value',
        'Variant SKU','Variant Grams','Variant Inventory Tracker','Variant Inventory Qty',
        'Variant Inventory Policy','Variant Fulfillment Service','Variant Price','Variant Compare At Price',
        'Variant Requires Shipping','Variant Taxable','Variant Barcode','Image Src','Image Position','Image Alt Text',
        'Gift Card','SEO Title','SEO Description','Google Shopping / Google Product Category','Google Shopping / Gender',
        'Google Shopping / Age Group','Google Shopping / MPN','Google Shopping / AdWords Grouping','Google Shopping / AdWords Labels',
        'Google Shopping / Condition','Google Shopping / Custom Product','Google Shopping / Custom Label 0','Google Shopping / Custom Label 1',
        'Google Shopping / Custom Label 2','Google Shopping / Custom Label 3','Google Shopping / Custom Label 4',
        'Variant Image','Variant Weight Unit','Variant Tax Code','Cost per item','Price / International',
        'Compare At Price / International','Status'
    ];
    $records = [];

    foreach ($products as $product) {
        $arr = array();
        $arr[0] = $product->slug;
        $arr[1] = $product->name;
        $arr[2] = $product->description;
        $arr[3] = $product->supplier->name;
        $cat = $product->category()->first();
        $category = $cat->name;
        $parent = $cat->parent_id;
        while ($parent != 0) {
            $cat = $cat->parent()->first();
            if($cat!=null) {
                $category = $cat->name.' > '.$category;
            }
            $parent = $cat->parent_id;
        }
        $arr[4] = $category;
        $arr[5] = '';
        $arr[6] = '';
        $arr[7] = $product->active == 1 ? 'TRUE' : 'FALSE';
        $arr[8] = 'Title';
        $arr[9] = 'Default Title';
        $arr[10] = '';
        $arr[11] = '';
        $arr[12] = '';
        $arr[13] = '';
        $arr[14] = '';
        $arr[15] = '';
        $arr[16] = '';
        $arr[17] = $product->stock;
        $arr[18] = 'deny';
        $arr[19] = 'manual';
        $arr[20] = $product->price;
        $arr[21] = '';
        $arr[22] = 'TRUE';
        $arr[23] = '';
        $arr[24] = '';
        $arr[25] = $product->image;
        $arr[26] = '1';
        $arr[27] = '';
        $arr[28] = '';
        $arr[29] = '';
        $arr[30] = '';
        $arr[31] = '';
        $arr[32] = '';
        $arr[33] = '';
        $arr[34] = '';
        $arr[35] = '';
        $arr[36] = '';
        $arr[37] = '';
        $arr[38] = '';
        $arr[39] = '';
        $arr[40] = '';
        $arr[41] = '';
        $arr[42] = '';
        $arr[43] = '';
        $arr[44] = '';
        $arr[45] = '';
        $arr[46] = '';
        $arr[47] = $product->supplier_price;
        $arr[48] = '';
        $arr[49] = '';
        $arr[50] = $product->active == 1 ? 'active' : 'draft';
        $records[] = $arr;
        if(isset($product->image_ex1) && $product->image_ex1 != "") {
            $arr = array();
            $arr[0] = $product->slug;
            $arr[1] = '';
            $arr[2] = '';
            $arr[3] = '';
            $arr[4] = '';
            $arr[5] = '';
            $arr[6] = '';
            $arr[7] = '';
            $arr[8] = '';
            $arr[9] = '';
            $arr[10] = '';
            $arr[11] = '';
            $arr[12] = '';
            $arr[13] = '';
            $arr[14] = '';
            $arr[15] = '';
            $arr[16] = '';
            $arr[17] = '';
            $arr[18] = '';
            $arr[19] = '';
            $arr[20] = '';
            $arr[21] = '';
            $arr[22] = '';
            $arr[23] = '';
            $arr[24] = '';
            $arr[25] = $product->image_ex1;
            $arr[26] = '2';
            $arr[27] = '';
            $arr[28] = '';
            $arr[29] = '';
            $arr[30] = '';
            $arr[31] = '';
            $arr[32] = '';
            $arr[33] = '';
            $arr[34] = '';
            $arr[35] = '';
            $arr[36] = '';
            $arr[37] = '';
            $arr[38] = '';
            $arr[39] = '';
            $arr[40] = '';
            $arr[41] = '';
            $arr[42] = '';
            $arr[43] = '';
            $arr[44] = '';
            $arr[45] = '';
            $arr[46] = '';
            $arr[47] = '';
            $arr[48] = '';
            $arr[49] = '';
            $arr[50] = '';
            $records[] = $arr;
        }
        if(isset($product->image_ex2) && $product->image_ex2 != "") {
            $arr = array();
            $arr[0] = $product->slug;
            $arr[1] = '';
            $arr[2] = '';
            $arr[3] = '';
            $arr[4] = '';
            $arr[5] = '';
            $arr[6] = '';
            $arr[7] = '';
            $arr[8] = '';
            $arr[9] = '';
            $arr[10] = '';
            $arr[11] = '';
            $arr[12] = '';
            $arr[13] = '';
            $arr[14] = '';
            $arr[15] = '';
            $arr[16] = '';
            $arr[17] = '';
            $arr[18] = '';
            $arr[19] = '';
            $arr[20] = '';
            $arr[21] = '';
            $arr[22] = '';
            $arr[23] = '';
            $arr[24] = '';
            $arr[25] = $product->image_ex2;
            $arr[26] = '3';
            $arr[27] = '';
            $arr[28] = '';
            $arr[29] = '';
            $arr[30] = '';
            $arr[31] = '';
            $arr[32] = '';
            $arr[33] = '';
            $arr[34] = '';
            $arr[35] = '';
            $arr[36] = '';
            $arr[37] = '';
            $arr[38] = '';
            $arr[39] = '';
            $arr[40] = '';
            $arr[41] = '';
            $arr[42] = '';
            $arr[43] = '';
            $arr[44] = '';
            $arr[45] = '';
            $arr[46] = '';
            $arr[47] = '';
            $arr[48] = '';
            $arr[49] = '';
            $arr[50] = '';
            $records[] = $arr;
        }
        if(isset($product->image_ex3) && $product->image_ex3 != "") {
            $arr = array();
            $arr[0] = $product->slug;
            $arr[1] = '';
            $arr[2] = '';
            $arr[3] = '';
            $arr[4] = '';
            $arr[5] = '';
            $arr[6] = '';
            $arr[7] = '';
            $arr[8] = '';
            $arr[9] = '';
            $arr[10] = '';
            $arr[11] = '';
            $arr[12] = '';
            $arr[13] = '';
            $arr[14] = '';
            $arr[15] = '';
            $arr[16] = '';
            $arr[17] = '';
            $arr[18] = '';
            $arr[19] = '';
            $arr[20] = '';
            $arr[21] = '';
            $arr[22] = '';
            $arr[23] = '';
            $arr[24] = '';
            $arr[25] = $product->image_ex3;
            $arr[26] = '4';
            $arr[27] = '';
            $arr[28] = '';
            $arr[29] = '';
            $arr[30] = '';
            $arr[31] = '';
            $arr[32] = '';
            $arr[33] = '';
            $arr[34] = '';
            $arr[35] = '';
            $arr[36] = '';
            $arr[37] = '';
            $arr[38] = '';
            $arr[39] = '';
            $arr[40] = '';
            $arr[41] = '';
            $arr[42] = '';
            $arr[43] = '';
            $arr[44] = '';
            $arr[45] = '';
            $arr[46] = '';
            $arr[47] = '';
            $arr[48] = '';
            $arr[49] = '';
            $arr[50] = '';
            $records[] = $arr;
        }
        if(isset($product->image_ex4) && $product->image_ex4 != "") {
            $arr = array();
            $arr[0] = $product->slug;
            $arr[1] = '';
            $arr[2] = '';
            $arr[3] = '';
            $arr[4] = '';
            $arr[5] = '';
            $arr[6] = '';
            $arr[7] = '';
            $arr[8] = '';
            $arr[9] = '';
            $arr[10] = '';
            $arr[11] = '';
            $arr[12] = '';
            $arr[13] = '';
            $arr[14] = '';
            $arr[15] = '';
            $arr[16] = '';
            $arr[17] = '';
            $arr[18] = '';
            $arr[19] = '';
            $arr[20] = '';
            $arr[21] = '';
            $arr[22] = '';
            $arr[23] = '';
            $arr[24] = '';
            $arr[25] = $product->image_ex4;
            $arr[26] = '5';
            $arr[27] = '';
            $arr[28] = '';
            $arr[29] = '';
            $arr[30] = '';
            $arr[31] = '';
            $arr[32] = '';
            $arr[33] = '';
            $arr[34] = '';
            $arr[35] = '';
            $arr[36] = '';
            $arr[37] = '';
            $arr[38] = '';
            $arr[39] = '';
            $arr[40] = '';
            $arr[41] = '';
            $arr[42] = '';
            $arr[43] = '';
            $arr[44] = '';
            $arr[45] = '';
            $arr[46] = '';
            $arr[47] = '';
            $arr[48] = '';
            $arr[49] = '';
            $arr[50] = '';
            $records[] = $arr;
        }
        if(isset($product->image_ex5) && $product->image_ex5 != "") {
            $arr = array();
            $arr[0] = $product->slug;
            $arr[1] = '';
            $arr[2] = '';
            $arr[3] = '';
            $arr[4] = '';
            $arr[5] = '';
            $arr[6] = '';
            $arr[7] = '';
            $arr[8] = '';
            $arr[9] = '';
            $arr[10] = '';
            $arr[11] = '';
            $arr[12] = '';
            $arr[13] = '';
            $arr[14] = '';
            $arr[15] = '';
            $arr[16] = '';
            $arr[17] = '';
            $arr[18] = '';
            $arr[19] = '';
            $arr[20] = '';
            $arr[21] = '';
            $arr[22] = '';
            $arr[23] = '';
            $arr[24] = '';
            $arr[25] = $product->image_ex5;
            $arr[26] = '6';
            $arr[27] = '';
            $arr[28] = '';
            $arr[29] = '';
            $arr[30] = '';
            $arr[31] = '';
            $arr[32] = '';
            $arr[33] = '';
            $arr[34] = '';
            $arr[35] = '';
            $arr[36] = '';
            $arr[37] = '';
            $arr[38] = '';
            $arr[39] = '';
            $arr[40] = '';
            $arr[41] = '';
            $arr[42] = '';
            $arr[43] = '';
            $arr[44] = '';
            $arr[45] = '';
            $arr[46] = '';
            $arr[47] = '';
            $arr[48] = '';
            $arr[49] = '';
            $arr[50] = '';
            $records[] = $arr;
        }
    }

//load the CSV document from a string
    $csv = Writer::createFromString('');

//insert the header
    $csv->insertOne($header);

//insert all the records
    $csv->insertAll($records);

    return $csv->output('products_export.csv');
}
public function csv_import(Request $request)
{

$setting =Setting::first();
////////////////demo//////////////
if($setting->live_production==0){
  Session::flash('info', 'demo');
  return redirect()->back();
}
//add settings import limit
// demo 0
$this->validate($request,[
'selected_category'=>'required',
'supplier_id'=>'required',
]);
 error_reporting(0);
$filepath = "uploads/imports/import.csv";

//////////Check Header
$requiredHeaders = array('name', 'price', 'stock','description', 'image', 'original_url'); //headers we expect
$header_check = fopen($filepath, 'r');
if (empty($header_check)){
  Session::flash('error', "Invalid: import.csv File Was Not Found");
  return redirect()->back();
}
$firstLine = fgets($header_check); //get first line of csv file
fclose($header_check);
$foundHeaders = str_getcsv(trim($firstLine), ',', '"'); //parse to array

/*if ($foundHeaders !== $requiredHeaders) {
  Session::flash('error', "File headers do not match");
   unlink($filepath);
   Session::flash('info', "File Deleted, Please Check the sample");
   return redirect()->back();
}*/
$rows=0;
$imported=0;
$updated=0;
$incomplete=0;
$handle = null;
$product = null;
if (($getdata = fopen($filepath, "r")) !== FALSE) {
			   fgetcsv($getdata);
			   while (($data = fgetcsv($getdata)) !== FALSE) {
					$fieldCount = count($data);
					for ($c=0; $c < $fieldCount; $c++) {
					  $columnData[$c] = $data[$c];
					}
                    if($handle!=null && $handle == $columnData[0]) {
                        if($columnData[26] != '1') {
                            if (!empty($columnData[26])) {
                                if ($columnData[26] == '2') {
                                    $product->image_ex1 = $columnData[25];
                                }
                                if ($columnData[26] == '3') {
                                    $product->image_ex2 = $columnData[25];
                                }
                                if ($columnData[26] == '4') {
                                    $product->image_ex3 = $columnData[25];
                                }
                                if ($columnData[26] == '5') {
                                    $product->image_ex4 = $columnData[25];
                                }
                                if ($columnData[26] == '6') {
                                    $product->image_ex5 = $columnData[25];
                                }
                                $product->save();
                            }
                            continue;
                        }
                    }
                   $rows++;
                   $handle = $columnData[0];
		      $product_name               = $columnData[1];
          $product_price              = $columnData[47];
          /*$product_price              = str_replace(',', '', $product_price);
          $product_price              = str_replace(' ', '', $product_price);
          $product_price              = preg_replace("/[^0-9,]/", "", $product_price);*/

          //calc price_percent_gain
          //$percentage_value = ($product_price/100)*$setting->price_percent_gain;//get percentage value
          //$new_price = $product_price + $percentage_value;//gets new sale price
          //calc price_percent_gain
          $new_price =  $columnData[20];
          // $product_price              = preg_replace('/\D/', '', $product_price);
          $product_stock              = ($columnData[17]);
          $product_stock              = preg_replace('/\D/', '', $product_stock);

          $product_description        = ($columnData[2]);
		  $product_image            = ($columnData[25]);
		  //$product_original_url          = ($columnData[5]);
          $product_url_slug 		  = str_slug ($product_name);
          $product_merchant           = $request->supplier_id;

          if(empty($columnData[4])) {
              $incomplete++;
              continue;
          }

          $category = explode(' > ',$columnData[4]);
          $parent = 0;
          $product_category = 0;
          foreach ($category as $parent_catgory) {
              $get_category = Category::where('name',$parent_catgory)->first();
              if ($get_category==null) {
                  $get_category = Category::create([
                      'name'=> $parent_catgory,
                      'parent_id'=> $parent,
                      'description'=>$parent_catgory,
                      'slug'=>str_slug($parent_catgory),
                  ]);
              }
              if($parent_catgory == end($category)) {
                  $product_category = $get_category->id;
              }
              else {
                  $parent = $get_category->id;
              }
          }
          //$product_category           = $request->selected_category;

          //check for empty fields and rows
          if (empty($product_merchant) || empty($product_name) || empty($product_price)|| empty($product_stock) || empty($product_image) /*|| empty($product_original_url)*/) {
          $incomplete++;
          continue;
          }
          // if($incomplete>0){
          //   Session::flash('warning', "($incomplete) Field(s) are empty");
          //   return redirect()->back();
          // }
          //updates aleady existing products
          // if (Product::where('original_url', '=',$product_original_url)->exists()&& !empty($product_price)) {
          //     $products = Product::where('original_url',$product_original_url)->first();
          //     $products->price = $product_price;
          //     $products->save();
          //     $updated++;
          //     continue;
          //     //skip if the product exists //verifying via original url
          // }
          if (Product::where('slug', '=',$product_url_slug)->exists()) {
               $updated++;
               continue;
               // skip if slug exists
          }

         // SQL Query to insert data into DataBase
         $product = Product::create([
             'name'=>$product_name,
             'description'=>$product_description,
             'category_id'=>$product_category,
             'supplier_price'=>$product_price,
             'price'=>$new_price,
             'stock'=>$product_stock,
             'supplier_id'=>$product_merchant,
             //'original_url'=>$product_original_url,
             'slug'=>$product_url_slug,
             'image'=>$product_image,
             'active' =>  $columnData[50] == 'active' ? 1 : 0,
           ]);
            $imported++;
          }
          unset($getdata);
          if (file_exists($filepath)){
              unlink($filepath);
           }

return redirect()->back()->with('message',"<div class='text-center'
                         style=' width: auto;
                          padding: 10px;
                          border: 5px solid gray;
                          margin: 0;''>
                          <div style='Color:black'> Total Processed $rows </div><br />
                          <div style='Color:green'> Imported $imported </div><br />
                          <div style='Color:blue'> Data Skipped/Updated $updated </div><br />
                          <div style='Color:red'> Incomplete Data $incomplete </div>
                        </div>");

}else {
  Session::flash('warning', "Failed");
  return redirect()->back();
}


}


////////////////////////////////////END CSV///////////////////////////////////
    public function destroy($id)
    {
      $product =Product::find($id);
      //
      if($product->parent_id==0){
        foreach ($product->variants as $product) {
          // dump($product->variants.' This has Childern');
      if (file_exists($product->image)){
        unlink($product->image);
      }
      if (file_exists($product->image_ex1)){
        unlink($product->image_ex1);
      }
      if (file_exists($product->image_ex2)){
        unlink($product->image_ex2);
      }
      if (file_exists($product->image_ex3)){
        unlink($product->image_ex3);
      }
      if (file_exists($product->image_ex4)){
        unlink($product->image_ex4);
      }
      if (file_exists($product->image_ex5)){
        unlink($product->image_ex5);
      }
      
      $product->forceDelete();
      }
      // dd($product->name.'This Main Product has no children');
    };
    // dd($product->name.' this is a child product');

      //continue
      if (file_exists($product->image)){
        unlink($product->image);
      }
      if (file_exists($product->image_ex1)){
        unlink($product->image_ex1);
      }
      if (file_exists($product->image_ex2)){
        unlink($product->image_ex2);
      }
      if (file_exists($product->image_ex3)){
        unlink($product->image_ex3);
      }
      if (file_exists($product->image_ex4)){
        unlink($product->image_ex4);
      }
      if (file_exists($product->image_ex5)){
        unlink($product->image_ex5);
      }
      
      Product::destroy($id);
      Session::flash('info', ' Deleted Successfully');
      return redirect()->back();
    }
    //// DELETE ALL ///
    public function delete_all()
    {
      $settings =Setting::first();
      if($settings->live_production==0){
        Session::flash('info', 'hold it right there; this is demo');
        return redirect()->back();
      }
      $pi = 0;
      $products =Product::all();
      foreach ($products as $product) {
      if (file_exists($product->image)){
        unlink($product->image);
      }
      if (file_exists($product->image_ex1)){
        unlink($product->image_ex1);
      }
      if (file_exists($product->image_ex2)){
        unlink($product->image_ex2);
      }
      if (file_exists($product->image_ex3)){
        unlink($product->image_ex3);
      }
      if (file_exists($product->image_ex4)){
        unlink($product->image_ex4);
      }
      if (file_exists($product->image_ex5)){
        unlink($product->image_ex5);
      }
      $product->forceDelete();
      $pi++;
      }
      Session::flash('info', "Successfully  Deleted ($pi) Products");
      return redirect()->back();
    }
}
