<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posyandu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Posyandu', function (Blueprint $table) {
            $table->id();
            $table->number('id_kelurahan');
            $table->string('nama_posyandu');
            $table->string('alamat_posyandu');
            $table->timestamps();
        });
        Schema::table('Posyandu', function (Blueprint $table) {
            $table->foreignId('id_kelurahan')->constrained('kelurahan');
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
