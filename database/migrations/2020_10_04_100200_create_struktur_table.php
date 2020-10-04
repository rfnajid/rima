<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrukturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('struktur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kalimat',100);
            $table->bigInteger('param_awal')->unsigned()->nullable();
            $table->bigInteger('param_akhir')->unsigned()->nullable();

            // index
            $table->unique('kalimat');
            $table->index('param_awal');
            $table->index('param_akhir');
            $table->foreign('param_awal')->nullable()->references('id')->on('kategori')->onDelete('set null');
            $table->foreign('param_akhir')->nullable()->references('id')->on('kategori')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('struktur');
    }
}
