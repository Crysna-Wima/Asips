<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoryPosyandu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_posyandu', function (Blueprint $table) {
            $table->id();
            $table->number('id_user');
            $table->number('id_balita');
            $table->string('tgl_posyandu');
            $table->string('berat_badan_balita');
            $table->string('tinggi_badan');
            $table->timestamps();
        });
        Schema::table('history_posyandu', function (Blueprint $table) {
            $table->foreignId('id_balita')->constrained('balita');
            $table->foreignId('id_user')->constrained('balita');
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