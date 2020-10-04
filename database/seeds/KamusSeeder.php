<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SukuKataLib\SukuKataLib as LIB;
use App\Helpers\GlobalHelper as G;

class KamusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $input_file = database_path()."/seeds/data/kbbi_data.csv";
        $output_file = database_path()."/seeds/output/output.csv";
        if (($input = fopen($input_file, "r")) !== FALSE && ($output=fopen($output_file,"wb"))!== FALSE) {
            while (($data = fgetcsv($input, 0, "\t")) !== FALSE) {

                $data[1]=trim($data[1]);

                G::log($data[1]);

                $syl = LIB::getSukuKata($data[1], false);
                $lastIndex = count($syl)-1;

                $data[4]= $syl[0];
                $data[5]= $lastIndex>0?$syl[1]:null;
                $data[6]= $syl[$lastIndex];
                $data[7]= $lastIndex<=0?null:$syl[$lastIndex-1];
                $data[8]= str_replace(' ','',LIB::getKonsonan($data[1]));
                $data[9]= str_replace(' ','',LIB::getVokal($data[1]));


                DB::table('kamus')->insert([
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
