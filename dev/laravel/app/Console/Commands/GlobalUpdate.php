<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Auth;
use App\Category;
use App\Product;
use App\Supplier;
use App\Currency;
use App\Setting;
use Session;
use DataTables;
use Goutte\Client;
use Sunra\PhpSimple\HtmlDomParser;
class GlobalUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'globalupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Global Product Update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info('Starting General Product Update  @'.\Carbon\Carbon::now());
        ini_set('max_execution_time', -1);
        // error_reporting(0);
        $settings =Setting::first();


        $active_suppliers = 0;
        ///------------------------------Session-----------------------------///
        Session::put('counter', 0);
        ///------------------------------Session-----------------------------///
          $suppliers = Supplier::all();
       foreach ($suppliers as $supplier){//start for each supplier
         if ($suppliers->active = 0){
           \Log::info("Skipped|$supplier->name|inactive");
           continue;//if supplier is inactive skip
         }
         $active_suppliers++;//active suppliers that was processed

         if (empty($supplier->price_update_element)){
           \Log::info("Skipped|$supplier->name|Price Update Element is Empty");
           continue;//skip if the elements is empty
         }

         $supplier_pro_count = count(Supplier::find($supplier->id)->products);
         if ($supplier_pro_count==0){
           \Log::info("Skipped|$supplier->name|NO Product was found for this supplier");
            continue;//check if supplier has Products
         }


         //RUN

         foreach ($supplier->products as $product) {//start for each product
           sleep(rand(1,2)) ;
           if (empty($product->original_url)){
             \Log::info("Skipped|$product->name| Product url is empty");
             continue;
           }
           $product_url ="$product->original_url";
           $product_price_element = "$supplier->price_update_element";
           $product_stock_element = "$supplier->stock_update_element";
           $product_description_element = "$supplier->description_update_element";

           $client = new Client();
           $client->setHeader("user-agent", "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0");
           $crawler = $client->request('GET', $product_url);
           if (false == ( $crawler = $client->request('GET', $product_url))) {
             // Error
             \Log::info("Skipped|$product->name|HtmlDomParser| Error");
               continue;
           }
           if (empty($crawler)){
             // Error
             \Log::info("Skipped|$product->name|Html| Error");
               continue;
           }
           $products = [];
                   // Find item link element

                   if ($crawler->filter($product_price_element)->count() > 0 ) {
                     $product_description='';
                     $product_price='';
                     $product_stock ='';
                       $price = $crawler->filter($product_price_element)->text();
                       $price = strtok($price, 'to');
                       // $price = preg_replace('/[^\p{L}\p{N}\s]/u', '', $price); //removes special charaters
                       $price = preg_replace("/[^0-9.]/", "", $price);
                       $price = str_replace(',', '', $price);
                       $product_price = str_replace(' ', '', $price);

                     $ebay_product_url = substr( $product->original_url, 0, 20 ) === "https://www.ebay.com";
                     $ali_product_url  = substr( $product->original_url, 0, 26 ) === "https://www.aliexpress.com";

                     if ($crawler->filter($product_stock_element)->count() > 0 ) {//a.vip
                         $product_stock = $crawler->filter($product_stock_element)->text();
                         $product_stock = str_replace('Last one', 1, $product_stock);
                         $product_stock = str_replace('pieces available', '', $product_stock);
                         $product_stock = str_replace(' ', '', $product_stock);
                         $product_stock = preg_replace("/[^0-9]/", "", $product_stock);
                     }elseif($crawler->filter("#isCartBtn_btn")->count() > 0 && $ebay_product_url=1) {//Wbay specific for products not showing Last one or Quantity
                           $product_stock = 1;
                     }elseif($crawler->filter("#j-add-cart-btn")->count() > 0 && $ali_product_url=1) {//Ali specific products
                           $product_stock = 1;
                     }else{
                       $product_stock = 0;
                     }
                     /////////////////////Redundant //////////////////////////////
                     if (empty($product_stock)){
                       $product_stock = 0;
                       // Session::flash('warning',"Retuned Empty - Stock Moved to 0");
                     }
                     if($crawler->filter("#isCartBtn_btn")->count() > 0 && $ebay_product_url=1) {//Ebay specific for products not showing Last one or Quantity
                           // Session::flash('warning',"Stock Moved to (1) beacause CartButton is active, Check Stock Element ");
                           $product_stock = 1;
                     }
                     if($crawler->filter("#j-add-cart-btn")->count() > 0 && $ali_product_url=1) {//Ali specific products
                           $product_stock = 1;
                           // Session::flash('warning',"Stock Moved to (1) beacause CartButton is active, Check Stock Element ");
                     }
                   /////////////////////////////////////////////////////////////


                     if ($crawler->filter($product_description_element)->count() > 0 ) {//a.vip
                         $product_description = $crawler->filter($product_description_element)->html();
                     }
                     // dump($product_stock." Stock.<hr/>");
                     // dump($price." Price.<hr/>");
                     // // dd("here");
                     // dd($product_description);

                     $product_supplier = $product->supplier->name;//get supplier name
                     //if the new price is empty
                     if (empty($product_price)){
                       \Log::info("Skipped|$product_supplier|$product->name| new price is empty");
                       continue;
                     }
                     // if description has value
                     if (!empty($product_description)){
                       $product->description = $product_description;
                     }

                     // dd('here');
                     if (!empty($product_price)){
                       //gain calculation
                       $percentage_value = ($product_price/100)*$settings->price_percent_gain;//get percentage value
                       $new_price = $product_price + $percentage_value;//gets new sale price
                        \Log::info("Updated|$product_supplier|$product->name|new price: $new_price");
                       //save
                       $product->supplier_price = $product_price;
                       $product->price = $new_price;
                       $product->stock = $product_stock;
                       $product->save();

                       ///------------Session-----------///
                       $counter = Session::get('counter');
                       $counter++;
                       Session::put('counter', $counter);
                       ///------------Session-----------///
                     }


                };


       }//end for each product



     }//end for each supplier
     ///------------Session-----------///
     $counter = Session::get('counter');
     //-----------UNSET----------------//
       Session::forget('counter');
     ///------------Session-----------///
   \Log::info('Ending General Product Update Now @'.\Carbon\Carbon::now());

   $this->info('Successfully Ran Update @ '.\Carbon\Carbon::now());
   $this->info("Active Suppliers:($active_suppliers)");
   $this->info("Success: Updated ($counter) Products");
    }
}
