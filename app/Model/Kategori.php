<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
   protected $table = 'kategori';

   public function parent(){
      return $this->belongsTo('App\Model\Kategori', 'parent_id');
   }

   public function children(){
      return $this->hasMany('App\Model\Kategori', 'parent_id');
   }

   public function kata(){
      return $this->belongsToMany('App\Model\Kata');
   }

   public function strukturAwal(){
      return $this->hasMany('App\Model\Struktur', 'param_awal');
   }

   public function strukturAkhir(){
      return $this->hasMany('App\Model\Struktur', 'param_akhir');
   }

}
