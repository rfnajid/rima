<?php

namespace App\Http\Controllers\ApiControllers\V1Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Model\Kata;
use App\Helpers\GlobalHelper;
use Illuminate\Support\Facades\DB;

class KamusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $data = Kata::all(GlobalHelper::getColumn());
        return response($data);
    }

    public function detail($kata){
        $data = Kata::where('kata',$kata)->get(GlobalHelper::getColumn());
        return response($data);
    }

    public function search($query){
        $query = '%'.$query.'%';
        $data = Kata::where('kata','like',$query)->get(GlobalHelper::getColumn());
        return response($data);
    }

    //
}