<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->call('KamusSeeder');
        $this->call('KategoriSeeder');
        $this->call('StrukturSeeder');
        Artisan::call('seed:kamus-kategori');
    }
}
