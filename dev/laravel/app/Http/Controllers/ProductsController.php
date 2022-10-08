<?php

namespace App\Http\Controllers;

use Request;
use App\Category;
use App\Setting;
use Session;
use App\Product;
use App\Page;
use App\Credit;
use App\Report;
use App\User;
use Redirect;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
      $settings =Setting::first();
      // $posts = Post::orderBy('id', 'desc')->take(6)->get();
      $products = Product::where('parent_id', '=', 0)->orderBy('id', 'desc')->paginate(9);
      return view('products')
      ->with('products',$products)
      ->with('categories',(Category::all()))
      ->with('pages',(Page::all()))
      ->with('settings',$settings);
    }
    public function search()
    {
      $query = request()->get('query');
      if (empty($query)) {
            Session::flash('info',__('messages.Query Is Empty'));
          return redirect('/products');
      }
      $min_length = 3;
      if(strlen($query) < $min_length){
      Session::flash('info',__('messages.Minimum Length is').$min_length);
      return redirect('/products');
      }
      $settings =Setting::first();
      // $products = Product::all()->where('parent_id', '=', 0);
      // $products = Product::all()->where('parent_id', '=', 0)->get();
      $products = Product::where('parent_id', '=', 0);
      $products = $products->where('name','like',  '%' . $query . '%')
                           ->orwhere('description','like',  '%' . $query . '%')
                           ->orderBy($settings->search_element, $settings->search_order);
      $products = $products->where('parent_id', '=', 0)->paginate(9);
      return view('search')
      ->with('query',$query)
      ->with('products',$products)
      ->with('categories',(Category::all()))
      ->with('pages',(Page::all()))
      ->with('settings',$settings);
    }

    
    public function product_page($slug, $id)
    {
      $url_path = $slug.'-'.$id;
      //get correct slog
      $slug = substr( $url_path, 0, strrpos( $url_path, '-' ) );
      //get correct id
      $id = trim($url_path,'-');
      $id = explode('-',$id);
      $id = end($id);

      $settings =Setting::first();
      $product = Product::where('slug',$slug)->where('id',$id)->first();
      if (empty($product)) {
            Session::flash('warning',__('messages.Product was not found'));
          return redirect('/products');
      }
      //// $pro_id = Product::where('id',$id)->first();
      ////////// Product Views Updater //////////
      $product->views_count=$product->views_count+1;
      $product->save();
      ////////// Product Views Updater //////////
      //Compare
      $query = $product->name;
      $compared_products_search = Product::where('parent_id', '=', 0);
      $compared_products_search = $compared_products_search->where('name','like',  '%' . $query . '%')->orderBy('price', 'asc')->get();
      // dd($compared_products_search);

      $compared_products = array();
      $count=0;
      foreach($compared_products_search as $ini_compared_product) {

       if($count == $settings->compared_products) break;
       $count++;
       //checks for similarity
       similar_text($product->name, $ini_compared_product->name, $perc); //12
       //applies percentage filter
       $Compare = $settings->compare_percentage;
             if  ($perc <$Compare){
               continue;
             }
             // removes active product from the table
             if ($product->id == $ini_compared_product->id ){
                continue;
             }
       $compared_products[] = $ini_compared_product;
      }

      // $arr  = $compared_products;
      // $sort = array();
      // foreach($arr as $k=>$v) {
      //     $sort['price'][$k] = $v['price'];
      // }
      //
      // array_multisort($sort['price'], SORT_DESC, $arr);
      //
      // echo "<pre>";
      // print_r($arr);
      // dd();

      // dump(count($compared_products));
      // dd($compared_products);


        // similar_text($product->name, $compared_product->name, $perc); //12
        // $Compare = $settings->compare_percentage;
        //       if  ($perc <$Compare){
        //         continue;
        //       }
        //       if ($compared_product->id = $product->id){
        //           continue;
        //       }

      //get random Products
      $rand_products = Product::where('parent_id', '=', 0)->inRandomOrder()->limit(5)->get();
      return view('product_page')
      ->with('product',$product)
      ->with('compared_products',$compared_products)
      ->with('rand_products',$rand_products)
      ->with('categories',(Category::all()))
      ->with('pages',(Page::all()))
      ->with('settings',$settings);
    }
    public function link()
    {
      // dump(request()->product_id);
      $product = Product::where('id',request()->product_id)->first();
      //checks if the product was found
      if (empty($product)) {
            Session::flash('warning',__('messages.Link Error Check URL'));
          return redirect('/products');
      }  
      
    return redirect("$product->slug-$product->id");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download_images($id) {
        $product = Product::findOrFail($id);
        //dd($product);
        $zip_file = asset('/uploads/zip/images.zip'); // Name of our archive to download

        // Initializing PHP class
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        // Adding file: second parameter is what will the path inside of the archive
        // So it will create another folder called "storage/" inside ZIP, and put the file there.
        $zip->addFile(asset($product->image), $product->image);

        if($product['image_ex1'] != "") {
            $zip->addFile(asset($product->image_ex1), $product->image_ex1);
        }
        if($product['image_ex2'] != "") {
            $zip->addFile(asset($product->image_ex2), $product->image_ex2);
        }
        if($product['image_ex3'] != "") {
            $zip->addFile(asset($product->image_ex3), $product->image_ex3);
        }
        if($product['image_ex4'] != "") {
            $zip->addFile(asset($product->image_ex4), $product->image_ex4);
        }
        if($product['image_ex5'] != "") {
            $zip->addFile(asset($product->image_ex5), $product->image_ex5);
        }
        $zip->close();
        //dd($zip_file);
        // We return the file immediately after download
        return response()->download($zip_file);
    }
}
