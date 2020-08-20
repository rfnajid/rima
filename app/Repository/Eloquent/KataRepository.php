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

    public function findByKata($word){
        $res = parent::where(['kata'],[$word]);

        if(count($res)>0){
            $res = $res[0];
        }else{
            $res = null;
        }

        return $res;
    }

    public function findByAkhir($word, $options=[]){
        error_log("KataRepository -> findByAkhir ->word : ".print_r($word, TRUE));

        $syls = SukuKataHelper::getSukuKataAkhir($word);
        $fields = ["sukuakhir1"];
        $query = [$syls[0]];

        $data = parent::where($fields,$query, $options);
        return $data;
    }

    public function findByAkhirGanda($word, $options=[]){
        $syl = SukuKataHelper::getSukuKataAkhir($word);
        $fields = ["sukuakhir1","sukuakhir2"];
        $query = [$syl[0],$syl[1]];

        $data = parent::where($fields,$query, $options);

        return $data;
    }

    public function findByAwal($word, $options=[]){
        $syl = SukuKataHelper::getSukuKataAwal($word);
        $fields = ["sukuawal1"];
        $query = [$syl[0]];

        $data = parent::where($fields,$query, $options);
        return $data;
    }

    public function findByAwalGanda($word, $options=[]){
        $syl = SukuKataHelper::getSukuKataAwal($word);
        $fields = ["sukuawal1","sukuawal2"];
        $query = [$syl[0],$syl[1]];

        $data = parent::where($fields,$query, $options);

        return $data;
    }

    public function findByKonsonan($word, $options=[])
    {
        $syl = SukuKataHelper::getKonsonan($word);
        $fields = ["konsonan"];
        $query = [$syl];

        $data = parent::where($fields,$query, $options);
        return $data;
    }

    public function findByVokal($word, $options=[])
    {
        $syl = SukuKataHelper::getKonsonan($word);
        $fields = ["vokal"];
        $query = [$syl];

        $data = parent::where($fields,$query, $options);
        return $data;
    }
}