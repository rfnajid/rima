<?php

namespace App\Http\Controllers\ApiControllers\V1Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\Model;
use App\Model\Kata;
use App\Helpers\GlobalHelper;
use Illuminate\Http\Request;
use App\Repository\KataRepositoryInterface;
use DanBovey\LinkHeaderPaginator\LengthAwarePaginator;

/**
 * @group  API Kamus
 *
 * API untuk mendapatkan arti kata
 */
class KamusController extends BaseController
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
     * Get List Kata
     *
     * Get list kata sesuai kamus
     *
     * @queryParam size jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data. Example: 3
     * @queryParam page pagination. Example: 1
     * @responseFile  responses/kamus.index.json
     */
    public function index(Request $request){

        $options = [
            'size' => $request->size,
            'request' => $request
        ];

        $paginator = new LengthAwarePaginator($this->repo->get($options));
        return $paginator->toResponse();
    }

     /**
     * Get Kata
     *
     * Get detail kata
     *
     * @urlParam kata kata yang mau diambil
     * @responseFile  responses/kamus.detail.json
     */

    public function detail($word){
       $res = $this->repo->findByKata($word);
       if(is_null($res)){
           return response(view('errors.404'),404);
       }
       return $res;
    }

     /**
     * Search Kata
     *
     * API untuk mencari kata
     *
     * @urlParam query kata kunci pencarian
     * @queryParam size jumlah kata yang mau ditampilkan. Gunakan 'all' untuk menampilkan semua data. Example: 3
     * @queryParam page pagination. Example: 1
     * @responseFile  responses/kamus.search.json
     */
    public function search(Request $request, $query){
        $options = [
            'size'=> $request->size,
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->search($query, $options));
        return $paginator->toResponse();
    }
}