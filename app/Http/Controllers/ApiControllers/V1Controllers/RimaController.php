<?php

namespace App\Http\Controllers\ApiControllers\V1Controllers;

use App\Http\Controllers\BaseController;
use App\Repository\KataRepositoryInterface;
use Illuminate\Http\Request;
use DanBovey\LinkHeaderPaginator\LengthAwarePaginator;



/**
 * @group  API Rima
 *
 * API untuk mendapatkan rima
 */
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

     /**
     * Get Rima Akhir
     *
     * Pencarian rima/kata berdasarkan sukukata terakhir
     *
     * @urlParam word kata yang ingin dicari rimanya
     * @queryParam size jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data. Example: 3
     * @queryParam page pagination. Example: 1
     * @responseFile  responses/rima.akhir.json
     */
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

    /**
     * Get Rima Akhir Ganda
     *
     * Pencarian rima/kata berdasarkan dua suku kata terakhir
     *
     * @urlParam word kata yang ingin dicari rimanya
     * @queryParam size jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data. Example: 3
     * @queryParam page pagination. Example: 1
     * @responseFile  responses/rima.akhir-ganda.json
     */
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

    /**
     * Get Rima Awal
     *
     * Pencarian rima/kata berdasarkan sukukata awal
     *
     * @urlParam word kata yang ingin dicari rimanya
     * @queryParam size jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data. Example: 3
     * @queryParam page pagination. Example: 1
     * @responseFile  responses/rima.awal.json
     */
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

    /**
     * Get Rima Awal Ganda
     *
     * Pencarian rima/kata berdasarkan dua sukukata awal
     *
     * @urlParam word kata yang ingin dicari rimanya
     * @queryParam size jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data. Example: 3
     * @queryParam page pagination. Example: 1
     * @responseFile  responses/rima.awal-ganda.json
     */
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

    /**
     * Get Rima Konsonan
     *
     * Pencarian rima/kata yang mirip berdasarkan konsonan
     *
     * @urlParam word kata yang ingin dicari rimanya
     * @queryParam size jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data. Example: 3
     * @queryParam page pagination. Example: 1
     * @responseFile  responses/rima.konsonan.json
     */
    public function getKonsonan(Request $request, $word){
        $options = [
            'size' => $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->findByKonsonan($word, $options));
        return $paginator->toResponse();
    }

    /**
     * Get Rima Vokal
     *
     * Pencarian rima/kata yang mirip berdasarkan Vokal
     *
     * @urlParam word kata yang ingin dicari rimanya
     * @queryParam size jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data. Example: 3
     * @queryParam page pagination. Example: 1
     * @responseFile  responses/rima.vokal.json
     */
    public function getVokal(Request $request, $word){
        $options = [
            'size' => $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->findByVokal($word, $options));
        return $paginator->toResponse();
    }
}