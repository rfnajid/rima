<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
   protected $table = 'Kamus';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   // protected $fillable = [
   //    'name', 'email',
   // ];

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
         'konsonan'
   ];
}
