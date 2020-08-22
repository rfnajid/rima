<?php

namespace App\Helpers;

use SukuKataLib\SukuKataLib;

class SukuKataHelper{

    public static function getSukuKata($str){
        return SukuKataLib::getSukuKata($str);
    }

    public static function getSukuKataAkhir($str){

        $syls = SukuKataLib::getSukuKata($str, false);
        $lastIndex = count($syls)-1;
        $sukuKataAkhir = $syls[$lastIndex];
        $sukuKataAkhirKedua = $lastIndex<=0?null:$syls[$lastIndex-1];

        return [$sukuKataAkhir, $sukuKataAkhirKedua];
    }

    public static function getSukuKataAwal($str){
        $syls = SukuKataLib::getSukuKata($str);
        $lastIndex = count($syls)-1;
        $sukuKataAwal = $syls[0];
        $sukuKataAwalKedua = $lastIndex>0?$syls[1]:null;

        return [$sukuKataAwal, $sukuKataAwalKedua];
    }

    public static function getKonsonan($str){
        return SukuKataLib::getKonsonan($str);
    }

    public static function getVokal($str){
        return SukuKataLib::getVokal($str);
    }
}