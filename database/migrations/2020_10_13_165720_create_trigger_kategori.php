<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $this->down();

        // create trigger : kategori_insert
        DB::unprepared('
            CREATE TRIGGER `kategori_insert` BEFORE INSERT ON `kategori` FOR EACH ROW begin
                select get_kategori_parents(new.parent_id) into @parents;
                set new.parents := @parents;
            end'
        );

        // create trigger : kategori_update
        DB::unprepared('
            CREATE TRIGGER `kategori_update` BEFORE UPDATE ON `kategori` FOR EACH ROW begin
                select get_kategori_parents(new.parent_id) into @parents;
                set new.parents := @parents;
            end'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop trigger if exists kategori_insert');
        DB::unprepared('drop trigger if exists kategori_update');
    }
}
