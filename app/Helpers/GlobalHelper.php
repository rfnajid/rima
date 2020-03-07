<?php

namespace App\Helpers;


class GlobalHelper {
    public static function getColumn(){
        return ['id','kata','arti'];
    }

    public static function getPagination(){
        return 17;
    }
}