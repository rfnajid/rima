<?php

namespace App\Repository\Eloquent;

use App\Model\Kata;
use App\Repository\KataRepositoryInterface;
use App\Helpers\SukuKataHelper;

class KataRepository extends BaseRepository implements KataRepositoryInterface
{

    // Constructor to bind model to repo
    public function __construct(Kata $model)
    {
        parent::__construct($model);
    }

    public function findByAkhir($word){
        error_log("KataRepository -> findByAkhir ->word : ".print_r($word, TRUE));

        $syls = SukuKataHelper::getSukuKataAkhir($word);
        error_log("KataRepository -> findByAkhir".print_r($syls, TRUE));
        $fields = ["sukuakhir1"];
        $query = [$syls[0]];

        $data = parent::where($fields,$query);
        return $data;
    }

    public function findByAkhirParsial($word){

    }

    public function findByAkhirGanda($word){
        $syl = SukuKataHelper::getSukuKataAkhir($word);
        $fields = ["sukuakhir1","sukuakhir2"];
        $query = [$syl[0],$syl[1]];

        $data = parent::where($fields,$query);

        return $data;
    }

    public function findByAkhirGandaParsial($word){

    }

    public function findByAwal($word){
        $syl = SukuKataHelper::getSukuKataAwal($word);
        $fields = ["sukuawal1"];
        $query = [$syl[0]];

        $data = parent::where($fields,$query);
        return $data;
    }

    public function findByAwalParsial($word){

    }

    public function findByKonsonan($word)
    {
        $syl = SukuKataHelper::getKonsonan($word);
        $fields = ["konsonan"];
        $query = [$syl];

        $data = parent::where($fields,$query);
        return $data;
    }
}