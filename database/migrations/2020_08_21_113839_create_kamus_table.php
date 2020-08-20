<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kata',30);
            $table->text('arti');
            $table->string('sukuawal1',10);
            $table->string('sukuawal2',10)->nullable();
            $table->string('sukuakhir1',10);
            $table->string('sukuakhir2',10)->nullable();
            $table->string('konsonan',20)->nullable();
            $table->string('vokal',20)->nullable();

            // index
            $table->index('kata');
            $table->index('sukuawal1');
            $table->index('sukuawal2');
            $table->index('sukuakhir1');
            $table->index('sukuakhir2');
            $table->index('konsonan');
            $table->index('vokal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamus');
    }
}
