<?php

namespace App\Repository\Eloquent;

use App\Model\Kata;
use App\Repository\PantunRepositoryInterface;
use App\Helpers\SukuKataHelper;
use Illuminate\Support\Facades\DB;

class PantunRepository implements PantunRepositoryInterface
{

    public function getSampiran($isi){

        $words = explode(' ',$isi);

        $syl = SukuKataHelper::getSukuKataAkhir($words[count($words)-1]);

        // get struktur
        $result = $this->getStruktur($syl[0]);

        if($result == null){
            // error... struktur not found
            return null;
        }

        // get awal
        if($result['param_awal']!=null){
            $result['awal'] = $this->getKata($result['param_awal']);
            if($result['awal'] == null){
                // error... kata awal not found
                return null;
            }
        }

        // if you want to log result you can do it here
        // lagi males, entaran aja dah
        // kwkwkw

        // reformat data to return final result (string)
        $result['kalimat'] = str_replace('{awal}',$result['awal']['kata'],$result['kalimat']);
        $result['kalimat'] = str_replace('{akhir}',$result['akhir'],$result['kalimat']);

        // // debugging
        // $result['syl'] = $syl;
        // return $result;

        // normal
        return $result['kalimat'];

    }

    private function getKata($kategori_id){
        $result = Kata::join('kamus_kategori','kamus.id','=','kamus_kategori.kamus_id')
            ->join('kategori','kategori.id','=','kamus_kategori.kategori_id')
            ->where('kategori.id','=',$kategori_id)
            ->orWhere('kategori.parents','like', $kategori_id)
            ->orWhere('kategori.parents','like', $kategori_id.',%')
            ->orWhere('kategori.parents','like', '%,'.$kategori_id.',%')
            ->orWhere('kategori.parents','like', '%,'.$kategori_id)
            ->select('kamus.kata','kategori.nama')
            ->get();

        if ($result->isEmpty()) {
            $result = null;
        }else{
            $result = $result->random();
        }

        return $result;
    }

    private function getStruktur($syl){
        $result = Kata::where('sukuakhir1',$syl)
            ->join('kamus_kategori','kamus.id','=','kamus_kategori.kamus_id')
            ->join('kategori','kategori.id','=','kamus_kategori.kategori_id')
            ->join('struktur', function($query){
                $query->on('struktur.param_akhir', '=', 'kategori.id')
                ->orWhere(DB::raw('
                    if (kategori.parents is null, 0, find_in_set(struktur.param_akhir, kategori.parents))
                '), "<>","0");
            })
            ->select('struktur.kalimat','struktur.param_awal','kamus.kata as akhir')
            ->get();

        if ($result->isEmpty()) {
            $result = null;
        }else{
            $result = $result->random();
        }

        return $result;
    }
}