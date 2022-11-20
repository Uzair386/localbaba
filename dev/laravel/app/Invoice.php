<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $fillable = [

    'user_id',
    'invoice_number',
    'payment_method',
    'status',
    'tax',
    'currency_symbol',
    'country',
    'address',
    'state',
    'city',
    'phone',
    'postal_code',
    'total_products',
    'total_items',
    'total_amount_without_tax',
    'tax_amount',
    'total_amount_with_tax',
    'tracking_code',
    'amount_gain',
    'supplier_amount',
    'user_read',
    'admin_read',
    'initial_amount',
    'coupon_code',
    'coupon_amount',
    'coupon_percentage_off',
  ];
  protected $appends = ['fulfillment_status','tracking_code', 'products_supplier_amount'];
  protected function str_putcsv($input, $delimiter = ',', $enclosure = '"')
    {
        // Open a memory "file" for read/write...
        $fp = fopen('php://temp', 'r+');
        // ... write the $input array to the "file" using fputcsv()...
        fputcsv($fp, $input, $delimiter, $enclosure);
        // ... rewind the "file" so we can read what we just wrote...
        rewind($fp);
        // ... read the entire line into a variable...
        $data = fread($fp, 1048576);
        // ... close the "file"...
        fclose($fp);
        // ... and return the $data to the caller, with the trailing newline from fgets() removed.
        return rtrim($data, "\n");
    }
  public function user(){
      // return $this->hasMany('App\User');
      return $this->belongsTo(User::class,'user_id','id');
  }
  public function child(){
      return $this->hasMany(Child_Invoice::class,'invoice_number','invoice_number');
  }

  public function  getFulfillmentStatusAttribute() {
      $total = $this->total_items;
      $items = $this->child()->where('tracking_code','!=',"")->count();
      if($items == 0) {
          return 'Un Fulfilled';
      }
      else if($items == $total) {
          return 'Fulfilled';
      }
      else {
          return 'Partially Fulfilled';
      }
  }

  public function getProductsSupplierAmountAttribute() {
      $items = $this->child()->get();
      //dd($items);
      return $items->sum('supplier_price');
  }
  public function  getTrackingCodeAttribute() {
      $items = $this->child()->get();
      //return $items;
      $tracking_codes = [];

      foreach ($items as $item) {
          if (!in_array($item->tracking_code,$tracking_codes)) {
            array_push($tracking_codes,$item->tracking_code);
          }
      }
      if(empty($tracking_codes)) {
          return null;
      }
      else {
          //return  json_encode($tracking_codes);
          $csvString = '';
          $csvString .= $this->str_putcsv($tracking_codes);
          return $csvString;
      }
  }

}
