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
use ZipArchive;

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
      $products = Product::where('active',1)->where('parent_id', '=', 0);
      $order = request()->get('order');
      $orders  = [
          'name' => ['name','asc'],
          'stock_h' => ['stock','desc'],
          'stock_l' => ['stock','asc'],
          'price_h' => ['price','desc'],
          'price_l' => ['price','asc'],
      ];
      if(isset($order) && array_key_exists($order,$orders)) {
          $products = $products->orderBy($orders[$order][0], $orders[$order][1])->paginate(9);
      }
      else {
          $products = $products->orderBy('id', 'desc')->paginate(9);
      }
      return view('products')
      ->with('products',$products)
      ->with('categories',Category::where('parent_id',0)->where('id','!=',1)->orderBy('name')->get())
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
      $products = Product::where('active',1)->where('parent_id', '=', 0);
      $products = $products->where('name','like',  '%' . $query . '%')
                           ->orwhere('description','like',  '%' . $query . '%')
                           ->orderBy($settings->search_element, $settings->search_order);
      $products = $products->where('active',1)->where('parent_id', '=', 0);
      $order = request()->get('order');
      $orders  = [
          'name' => ['name','asc'],
          'stock_h' => ['stock','desc'],
          'stock_l' => ['stock','asc'],
          'price_h' => ['price','desc'],
          'price_l' => ['price','asc'],
      ];
      if(isset($order) && array_key_exists($order,$orders)) {
          $products = $products->orderBy($orders[$order][0], $orders[$order][1])->paginate(9);
      }
      else {
          $products = $products->orderBy('id', 'desc')->paginate(9);
      }
      return view('search')
      ->with('query',$query)
      ->with('products',$products)
      ->with('categories',Category::where('parent_id',0)->where('id','!=',1)->orderBy('name')->get())
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
      $compared_products_search = Product::where('active',1)->where('parent_id', '=', 0);
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
      $rand_products = Product::where('active',1)->where('parent_id', '=', 0)->inRandomOrder()->limit(5)->get();
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

        // Define Dir Folder
        $public_dir='uploads/zip';

        // Zip File Name
        $zipFileName = $product->slug.'-images.zip';

        // Initializing PHP class
        $zip = new ZipArchive;


        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {

            // Add Files in ZipArchive
            $img1 = explode('/',$product->image);
            $zip->addFile($product->image, end($img1));

            if($product['image_ex1'] != "") {
                $img2 = explode('/',$product->image_ex1);
                $zip->addFile($product->image_ex1, end($img2));
            }
            if($product['image_ex2'] != "") {
                $img3 = explode('/',$product->image_ex2);
                $zip->addFile($product->image_ex2, end($img3));
            }
            if($product['image_ex3'] != "") {
                $img4 = explode('/',$product->image_ex3);
                $zip->addFile($product->image_ex3, end($img4));
            }
            if($product['image_ex4'] != "") {
                $img5 = explode('/',$product->image_ex4);
                $zip->addFile($product->image_ex4, end($img5));
            }
            if($product['image_ex5'] != "") {
                $img6 = explode('/',$product->image_ex5);
                $zip->addFile($product->image_ex5, end($img6));
            }

            // Close ZipArchive
            $zip->close();
        }
        //dd($zip_file);
        // We return the file immediately after download
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath=$public_dir.'/'.$zipFileName;
        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
        //return response()->download($zip_file);
        return redirect()->back();
    }
}
