<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSeminar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_seminar', function (Blueprint $table) {
            $table->bigIncrements('id_seminar');
            $table->dateTimeTz('waktu');
            $table->string('nama_seminar');
            $table->string('deskripsi');
            $table->timestamps();
            $table->bigInteger('topik_id')->unsigned();
            $table->foreign('topik_id')->references('id_topik')->on('table_topik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_seminar');
    }
}
