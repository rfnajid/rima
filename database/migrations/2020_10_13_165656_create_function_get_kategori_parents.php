<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionGetKategoriParents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create function : get_kategori_parents
        $this->down();
        DB::unprepared('
        CREATE FUNCTION get_kategori_parents (p_parent_id bigint) RETURNS varchar(100) CHARSET utf8
            READS SQL DATA
        begin

            declare v_current_id bigint default p_parent_id;
            declare v_looping boolean default true;
            declare v_parent_id bigint;

            declare v_result varchar(100);

            while v_looping do
                set v_result = concat_ws(",",v_result, v_current_id);
                select parent_id into v_parent_id from kategori where id=v_current_id;

                if(v_parent_id is null)
                then
                    set v_looping = false;
                else
                    set v_current_id = v_parent_id;
                end if;
              end while;
              return v_result;
        end;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION if exists get_kategori_parents');
    }
}
