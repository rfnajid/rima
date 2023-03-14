<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogPantun extends Model
{
   protected $table = 'log_pantun';

   protected $fillable = [
      'input',
      'output'
   ];

}
