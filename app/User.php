<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];
   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       'password', 'remember_token',
   ];

   public function addresses()
   {
     return $this->belongsToMany(Address::class);
   }

   public function shoppingCart()
   {
     return $this->belongsToMany(shoppingCart::class);
   }
}
