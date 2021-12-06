<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Balita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->number('id_posyandu');
            $table->string('nama_balita');
            $table->string('nik_orang_tua');
            $table->string('nama_orang_tua');
            $table->string('tgl_lahir_balita');
            $table->string('jenis_kelamin_balita');
            $table->timestamps();
        });
        Schema::table('balita', function (Blueprint $table) {
            $table->foreignId('id_posyandu')->constrained('posyandu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}