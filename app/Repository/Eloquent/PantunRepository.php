<?php

namespace App\Repository\Eloquent;

use App\Model\Kata;
use App\Repository\PantunRepositoryInterface;
use App\Helpers\SukuKataHelper;

class PantunRepository implements PantunRepositoryInterface
{

    protected $modelKata;

    // Constructor to bind model to repo
    public function __construct(Kata $modelKata)
    {
    }

    public function getSampiran($isi){
        $res = 'burung beo, buruk gagak';
        return $res;
    }
}