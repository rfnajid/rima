<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\GlobalHelper as G;

class KamusKategoriSeeder extends Seeder
{

    private $table = 'kamus_kategori';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($filename)
    {
        $input_file = database_path().'/seeds/data/kamus-kategori/'.$filename.'.csv';

        if(!$filename){
            G::log('No file selected!!!');
            return;
        }

        G::log('KAMUS KATEGORI SEEDER, FILENAME : '. $filename);


        $isHeader = true;
        if(($input = fopen($input_file,"r")) !== FALSE){
            while(($data = fgetcsv($input, 0, ';')) !== FALSE){
                if($isHeader) {
                    $isHeader = false;
                    continue;
                }

                G::log("Seeding Kamus-Kategori, {$filename} : ".$data[0].' - '.$data[1]);

                DB::table($this->table)->insert([
                    'kamus_id' => $data[0],
                    'kategori_id' => $data[1]
                ]);
            }
        }

        fclose($input);
    }
}
