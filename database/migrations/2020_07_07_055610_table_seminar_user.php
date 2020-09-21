<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSeminarUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_seminar_user', function (Blueprint $table) {
            $table->bigIncrements('id_su');
            $table->bigInteger('no_sertifikat');
            $table->string('cetak_sertifikat');
            $table->string('pesan_sertifikat');
            $table->string('sebagai');
            $table->timestamps();
            $table->bigInteger('seminar_id')->unsigned();
            $table->foreign('seminar_id')->references('id_seminar')->on('table_seminar');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_seminar_user');
    }
}
