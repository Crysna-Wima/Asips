<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Kelurahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kelurahan', function (Blueprint $table) {
            $table->id();
            $table->number('id_kecamatan');
            $table->string('kelurahan');
            $table->timestamps();
        });
        Schema::table('Kelurahan', function (Blueprint $table) {
            $table->foreignId('id_kecamatan')->constrained('kecamatans');
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