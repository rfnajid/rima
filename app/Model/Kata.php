<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
   protected $table = 'kamus';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

   /**
      * The attributes excluded from the model's JSON form.
      *
      * @var array
      */
   protected $hidden = [
         'sukuawal1',
         'sukuawal2',
         'sukuakhir1',
         'sukuakhir2',
         'konsonan',
         'vokal'
   ];


   public function kategori(){
      return $this->belongsToMany('App\Model\Kategori');
   }
}
