<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\BaseController;
use App\Repository\KataRepositoryInterface;
use App\Repository\BaseRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper as G;


class WebController extends BaseController{
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

    public function index(){
        $recommendations = [
            ["kata"=>"Kutipan"],
            ["kata"=>"Radio"],
            ["kata"=>"Histogram"],
            ["kata"=>"Senja"],
            ["kata"=>"Aksara"],
            ["kata"=>"Tata Usaha"],
            ["kata"=>"Ketenagakerjaan"],
            ["kata"=>"Kentang"]
        ];
        $colors = G::getColors();
        return view('pages.home', ['recommendations' => $recommendations, 'colors' => $colors]);
    }

    public function search(Request $request){
        $word = $request->input('search');
        if(!$word){
            $word = 'sayang';
        }
        return redirect('/rima/'.$word);
    }

    public function rima($word){

        $options = [
            "limit" => 21
        ];

        $rimas = [
            [
                "type" => 'rima akhir',
                "data" => $this->repo->findByAkhir($word, $options)
            ],
            [
                "type" => 'rima akhir ganda',
                "data" => $this->repo->findByAkhirGanda($word, $options)
            ],
            [
                "type" => 'rima awal',
                "data" => $this->repo->findByAwal($word, $options)
            ],
            [
                "type" => 'rima awal ganda',
                "data" => $this->repo->findByAwalGanda($word, $options)
            ],
            [
                "type" => 'rima konsonan',
                "data" => $this->repo->findByKonsonan($word, $options)
            ]

        ];

        $kamus= $this->repo->findByKata($word);
        if($kamus){
            $kamus['arti'] = htmlspecialchars_decode($kamus['arti']);
            $kamus['arti'] = str_replace(';',';<br>',$kamus['arti']);
        }

        return view('pages.rima',[
            'kata' => htmlspecialchars_decode($word),
            'kamus'=> $kamus,
            'rimas' => $rimas,
            'colors'=> G::getColors()
        ]);
    }

    public function all(){

    }
}