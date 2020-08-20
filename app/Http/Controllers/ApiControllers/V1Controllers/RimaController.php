<?php

namespace App\Http\Controllers\ApiControllers\V1Controllers;

use App\Http\Controllers\BaseController;
use App\Repository\KataRepositoryInterface;
use App\Repository\BaseRepositoryInterface;


class RimaController extends BaseController
{

    private $repo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(KataRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getAkhir($word){
        error_log("RimaController -> getAkhir".print_r($word, TRUE));

        return response($this->repo->findByAkhir($word));
    }

    public function getAkhirParsial(){

    }

    public function getAkhirGanda($word){
        return response($this->repo->findByAkhirGanda($word));
    }

    public function getAkhirGandaParsial(){

    }

    public function getAwal($word){
        return response($this->repo->findByAwal($word));
    }

    public function getAwalParsial(){

    }

    public function getKonsonan($word){
        return response($this->repo->findByKonsonan($word));
    }
}