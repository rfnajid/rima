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

    public function search($query, $options=[]){

        $options['search'] = [
            'field' => 'kata',
            'query' => $query
        ];

        return $this->where($options);
    }

    public function findByKata($word, $options=[]){

        $options['where'] = [
            'field'=>['kata'],
            'query'=>[$word]
        ];

        $res = $this->where($options);

        if(count($res)>0){
            $kata = $res[0];
            for ($i=1; $i < count($res); $i++) {
                $kata['arti'] .= "&lt;br&gt;".$res[$i]['arti'];
            }
            $res = $kata;
        }else{
            $res = null;
        }

        return $res;
    }

    public function findByAkhir($word, $options=[]){
        $options = $this->setRimaOptions($options, $word);

        $syl = SukuKataHelper::getSukuKataAkhir($word);

        $options['where'] = [
            'field'=>['sukuakhir1'],
            'query'=>[$syl[0]]
        ];

        $data = $this->where($options);
        return $data;
    }

    public function findByAkhirGanda($word, $options=[]){
        $options = $this->setRimaOptions($options, $word);
        $options =

        $syl = SukuKataHelper::getSukuKataAkhir($word);
        $fields = ["sukuakhir1","sukuakhir2"];
        $query = [$syl[0],$syl[1]];

        $options['where'] = [
            'field'=>["sukuakhir1","sukuakhir2"],
            'query'=>[$syl[0],$syl[1]]
        ];

        $data = parent::where($options);

        return $data;
    }

    public function findByAwal($word, $options=[]){
        $options = $this->setRimaOptions($options, $word);

        $syl = SukuKataHelper::getSukuKataAwal($word);

        $options['where'] = [
            'field'=>['sukuawal1'],
            'query'=>[$syl[0]]
        ];

        $data = parent::where($options);
        return $data;
    }

    public function findByAwalGanda($word, $options=[]){
        $options = $this->setRimaOptions($options, $word);

        $syl = SukuKataHelper::getSukuKataAwal($word);

        $options['where'] = [
            'field'=>["sukuawal1","sukuawal2"],
            'query'=>[$syl[0],$syl[1]]
        ];

        $data = parent::where($options);

        return $data;
    }

    public function findByKonsonan($word, $options=[]){
        $options = $this->setRimaOptions($options, $word);

        $syl = SukuKataHelper::getKonsonan($word);

        $options['where'] = [
            'field'=>['konsonan'],
            'query'=>[$syl[0]]
        ];

        $data = parent::where($options);
        return $data;
    }

    public function findByVokal($word, $options=[]){
        $options = $this->setRimaOptions($options, $word);

        $syl = SukuKataHelper::getVokal($word);

        $options['where'] = [
            'field'=>['vokal'],
            'query'=>[$syl[0]]
        ];

        $data = parent::where($options);
        return $data;
    }

    private function setRimaOptions($options, $word){
        $options['select']=['kata'];
        $options['distinct']='kata';
        $options['not_in'] = [
            "field" => "kata",
            "values" => [$word]
        ];

        return $options;
    }
}