<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MyResetPassword;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'email',
      'password',
      'contact_name',
      'country_id',
      'state',
      'city',
      'postal_code',
      'address',
      'phone_number',
      'validation_code',
      'active',
    ];
    public function products(){
        return $this->hasMany('App\Product');
      }
    public function invoice(){
        return $this->hasMany('App\Invoice');
      }
      public function report(){
          return $this->hasMany('App\Report');
        }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
      }




    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sendPasswordResetNotification($token)
{
    $this->notify(new MyResetPassword($token));
}
}
