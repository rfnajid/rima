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


        $word = urldecode($word);

        $options = [
            "limit" => 21
        ];

        $rimas = [
            $this->getAkhir($word,$options),
            $this->getAkhirGanda($word,$options),
            $this->getAwal($word,$options),
            $this->getAwalGanda($word,$options),
            $this->getKonsonan($word,$options),
            $this->getVokal($word,$options)
        ];

        $kamus= $this->repo->findByKata($word);
        if($kamus){
            $kamus['arti'] = htmlspecialchars_decode($kamus['arti']);
            $kamus['arti'] = str_replace(';',';<br>',$kamus['arti']);
        }

        return view('pages.rima',[
            'kata' => $word,
            'kamus'=> $kamus,
            'rimas' => $rimas,
            'colors'=> G::getColors()
        ]);
    }

    public function more($word, $type){
        $word = urldecode($word);
        $rima = [];
        switch ($type) {
            case 'akhir':
                $rima = $this->getAkhir($word);
            break;
            case 'akhir-ganda':
                $rima = $this->getAkhirGanda($word);
            break;
            case 'awal':
                $rima = $this->getAwal($word);
            break;
            case 'awal-ganda':
                $rima = $this->getAwalGanda($word);
            break;
            case 'konsonan':
                $rima = $this->getKonsonan($word);
            break;
            case 'vokal':
                $rima = $this->getVokal($word);
            break;
            default:
                redirect('/');
                return;
            break;
        }

        $kamus= $this->repo->findByKata($word);
        if($kamus){
            $kamus['arti'] = htmlspecialchars_decode($kamus['arti']);
            $kamus['arti'] = str_replace(';',';<br>',$kamus['arti']);
        }

        return view('pages.more',[
            'kata' => $word,
            'kamus'=> $kamus,
            'rima' => $rima,
            'colors'=> G::getColors()
        ]);
    }

    private function getAkhir($word,$options=null){
        return [
            "type" => 'rima akhir',
            "slug" => "akhir",
            "data" => $this->repo->findByAkhir($word, $options)
        ];
    }

    private function getAkhirGanda($word,$options=null){
        return [
            "type" => 'rima akhir ganda',
            "slug" => 'akhir-ganda',
            "data" => $this->repo->findByAkhirGanda($word, $options)
        ];
    }

    private function getAwal($word,$options=null){
        return [
            "type" => 'rima awal',
            "slug" => 'awal',
            "data" => $this->repo->findByAwal($word, $options)
        ];
    }

    private function getAwalGanda($word,$options=null){
        return [
            "type" => 'rima awal ganda',
            "slug" => 'awal-ganda',
            "data" => $this->repo->findByAwalGanda($word, $options)
        ];
    }

    private function getKonsonan($word,$options=null){
        return [
            "type" => 'rima konsonan',
            "slug" => "konsonan",
            "data" => $this->repo->findByKonsonan($word, $options)
        ];
    }

    private function getVokal($word,$options=null){
        return [
            "type" => 'rima vokal',
            "slug" => "vokal",
            "data" => $this->repo->findByVokal($word, $options)
        ];
    }
}