<?php

namespace App\Http\Controllers\ApiControllers\V1Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\Model;
use App\Model\Kata;
use App\Helpers\GlobalHelper;
use Illuminate\Http\Request;
use App\Repository\KataRepositoryInterface;
use DanBovey\LinkHeaderPaginator\LengthAwarePaginator;


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

    public function index(Request $request){

        $options = [
            'size' => $request->size,
            'request' => $request
        ];

        $paginator = new LengthAwarePaginator($this->repo->get($options));
        return $paginator->toResponse();
    }

    public function detail($kata){
       $res = $this->repo->findByKata($kata);
       if(is_null($res)){
           return response(view('errors.404'),404);
       }
       return $res;
    }

    public function search(Request $request, $query){
        $options = [
            'request'=>$request
        ];
        $paginator = new LengthAwarePaginator($this->repo->search($query, $options));
        return $paginator->toResponse();
    }

    //
}