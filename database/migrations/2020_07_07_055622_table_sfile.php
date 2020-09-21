<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_sfile', function (Blueprint $table) {
            $table->bigIncrements('id_sfile');
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
        Schema::dropIfExists('table_sfile');
    }
}
