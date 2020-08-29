<?php

namespace App\Http\Controllers\ApiControllers\V1Controllers;

use App\Http\Controllers\BaseController;
use App\Repository\KataRepositoryInterface;
use Illuminate\Http\Request;
use DanBovey\LinkHeaderPaginator\LengthAwarePaginator;



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

    public function getAkhir(Request $request, $word){
        $options = [
            'size' => $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->findByAkhir($word, $options));
        return $paginator->toResponse();
    }

    public function getAkhirParsial(){

    }

    public function getAkhirGanda(Request $request, $word){
        $options = [
            'size' => $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->findByAkhirGanda($word, $options));
        return $paginator->toResponse();
    }

    public function getAkhirGandaParsial(){

    }

    public function getAwal(Request $request, $word){
        $options = [
            'size' => $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->findByAwal($word, $options));
        return $paginator->toResponse();
    }

    public function getAwalParsial(){

    }

    public function getAwalGanda(Request $request, $word){
        $options = [
            'size' => $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->findByAwalGanda($word, $options));
        return $paginator->toResponse();
    }

    public function getAwalGandaParsial(){

    }

    public function getKonsonan(Request $request, $word){
        $options = [
            'size' => $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->findByKonsonan($word, $options));
        return $paginator->toResponse();
    }

    public function getVokal(Request $request, $word){
        $options = [
            'size' => $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->findByVokal($word, $options));
        return $paginator->toResponse();
    }
}