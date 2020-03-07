<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Model\Kata;
use App\Helpers\GlobalHelper;
use App\Helpers\SukuKataLib;

class RimaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAkhir($word){
        $syl=SukuKataLib::getLastSyllables($word);
        $data = Kata::where('sukuakhir2',$syl)->get(GlobalHelper::getColumn());
        return response($data);
    }

    public function getAkhirParsial(){

    }

    public function getAkhirGanda(){

    }

    public function getAkhirGandaParsial(){

    }

    public function getAwal($word){
        $syl=SukuKataLib::getFirstSyllables($word);
        $data = Kata::where('sukuawal1',$syl)->get(GlobalHelper::getColumn());
        return response($data);
    }

    public function getAwalParsial(){

    }

    public function getKonsonan($word){
        $syl = SukuKataLib::getConsonant($word);
        $data = Kata::where('konsonan',$syl)->get(GlobalHelper::getColumn());
        return response($data);
    }

    //
}