<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Database\Seeders\KamusKategoriSeeder;
use App\Helpers\GlobalHelper as G;


class SeedingKamusKategoriCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:seed-kamus-kategori {filename?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Seeding Kamus-Kategori from database/seeders/data/kamus-kategori";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {

        $filenames = $this->argument('filename');

        $seeder = new KamusKategoriSeeder();

        if(count($filenames) == 0){
            $dir = database_path().'/seeders/data/kamus-kategori/*.csv';
            $filenames = array_map('basename',glob($dir, GLOB_BRACE));

            $this->call('db:truncate',['tables' => ['kamus_kategori']]);
        }

        foreach ($filenames as $filename) {
            $filename = str_replace('.csv','',$filename);

            $seeder->run($filename);
        }

    }
}
