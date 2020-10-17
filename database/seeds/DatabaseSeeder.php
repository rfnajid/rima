<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
