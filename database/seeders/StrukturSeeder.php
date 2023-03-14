<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\GlobalHelper as G;

class StrukturSeeder extends Seeder
{
    private $table = 'struktur';
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $input_file = database_path().'/seeders/data/struktur.csv';

        $isHeader = true;
        if(($input = fopen($input_file,"r")) !== FALSE){

            DB::table($this->table)->delete();

            while(($data = fgetcsv($input, 0, ';')) !== FALSE){
                if($isHeader) {
                    $isHeader = false;
                    continue;
                }

                G::log('Seeding Struktur : '.$data[1]);

                DB::table($this->table)->insert([
                    'id' => $data[0],
                    'kalimat' => $data[1],
                    'param_awal' => $data[2]? $data[2]: null,
                    'param_akhir' => $data[3]
                ]);
            }
        }

        fclose($input);

    }
}
