<?php

namespace App\Helpers;


class GlobalHelper {

    public static function log($str){
        error_log(print_r($str, TRUE));
    }

    public static function getColors(){
        return [
            "red",
            "green",
            "blue",
            "orange",
            "dark",
            "alpha",
            "violet",
            "yellow"
        ];
    }
}