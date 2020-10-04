<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamusKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamus_kategori', function (Blueprint $table) {
            $table->bigInteger('kamus_id')->unsigned();
            $table->bigInteger('kategori_id')->unsigned();

            // index
            $table->primary(['kamus_id','kategori_id']);
            $table->foreign('kamus_id')->references('id')->on('kamus')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamus_kategori');
    }
}
