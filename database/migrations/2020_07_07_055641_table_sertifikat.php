<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSertifikat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_sertifikat', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_sertifikat');
            $table->string('nama_sertifikat');
            $table->string('path');
            $table->timestamps();
            $table->bigInteger('seminar_id')->unsigned();
            $table->foreign('seminar_id')->references('id_seminar')->on('table_seminar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_sertifikat');
    }
}
