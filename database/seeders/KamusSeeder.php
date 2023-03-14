<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SukuKataLib\SukuKataLib as LIB;
use App\Helpers\GlobalHelper as G;

class KamusSeeder extends Seeder
{

    private $table = 'kamus';

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        $input_file = database_path()."/seeders/data/kbbi_data.csv";
        $output_file = database_path()."/seeders/output/output.csv";
        if (($input = fopen($input_file, "r")) !== FALSE && ($output=fopen($output_file,"wb"))!== FALSE) {

            DB::table($this->table)->delete();

            while (($data = fgetcsv($input, 0, "\t")) !== FALSE) {

                $data[1]=trim($data[1]);

                G::log('Seeding Kamus : '.$data[1]);

                $syl = LIB::getSukuKata($data[1], false);
                $lastIndex = count($syl)-1;

                $data[4]= $syl[0];
                $data[5]= $lastIndex>0?$syl[1]:null;
                $data[6]= $syl[$lastIndex];
                $data[7]= $lastIndex<=0?null:$syl[$lastIndex-1];
                $data[8]= str_replace(' ','',LIB::getKonsonan($data[1]));
                $data[9]= str_replace(' ','',LIB::getVokal($data[1]));


                DB::table($this->table)->insert([
                    'id' => $data[0],
                    'kata' => $data[1],
                    'arti' => $data[2],
                    'sukuawal1' => $data[4],
                    'sukuawal2' => $data[5],
                    'sukuakhir1'=> $data[6],
                    'sukuakhir2'=> $data[7],
                    'konsonan'=> $data[8],
                    'vokal'=> $data[9],
                    'sumber'=> "kbbi"
                ]);

                fputs($output,implode("\t",$data)."\n");

            }

            fclose($input);
            fclose($output);
        }
    }
}
