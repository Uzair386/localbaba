<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $fillable = [
    'name',
    'email',
    'contact_name',
    'address',
    'url',
    'image',
    'phone_number',
    'amount_sold',
    'active',
    'price_update_block',
    'price_update_element',
    'stock_update_element',
    'description_update_element',
    'currency_id',
    'country_id',
  ];

  public function products(){
      return $this->hasMany('App\Product');
    }
  public function invoice(){
      return $this->hasMany('App\Invoice');
    }
  public function sub_invoice(){
      return $this->hasMany('App\Child_Invoice');
    }
    public function report(){
        return $this->hasMany('App\Report');
      }
  public function currency(){
      return $this->belongsTo(Currency::class,'currency_id','id');
    }
public function country(){
    return $this->belongsTo(Country::class,'country_id','id');
  }
}
