<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSeminar2 extends Migration
{
    /**
     * Run the migrations.
     *
    * @return void
     */
    public function up()
    {
        Schema::table('table_seminar', function($table) {
            $table->engine = 'InnoDB';
            $table->renameColumn('waktu', 'waktu_mulai');
            $table->dateTimeTz('waktu_selesai');
            $table->string('durasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_seminar', function($table) {
            $table->dropColumn('waktu_mulai');
            $table->dropColumn('waktu_selesai');
            $table->dropColumn('durasi');
        });
    }
}
