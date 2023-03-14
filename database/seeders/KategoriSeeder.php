<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\GlobalHelper as G;


class KategoriSeeder extends Seeder
{

    private $table = 'kategori';

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $input_file = database_path().'/seeders/data/kategori.csv';

        $isHeader = true;
        if(($input = fopen($input_file,"r")) !== FALSE){

            DB::table($this->table)->delete();

            while(($data = fgetcsv($input, 0, ';')) !== FALSE){
                if($isHeader) {
                    $isHeader = false;
                    continue;
                }

                G::log('Seeding Kategori : '.$data[1]);

                DB::table($this->table)->insert([
                    'id' => $data[0],
                    'nama' => $data[1],
                    'parent_id' => $data[2] ? $data[2]: null
                ]);
            }
        }

        fclose($input);

    }
}
