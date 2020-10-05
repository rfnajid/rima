<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
   protected $table = 'struktur';

   public function kategoriAwal(){
      return $this->hasMany('App\Model\Kategori', 'param_awal');
   }

   public function kategoriAkhir(){
      return $this->hasMany('App\Model\Kategori', 'param_akhir');
   }

}
