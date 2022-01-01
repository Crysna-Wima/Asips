<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class balitaparentController extends Controller
{
    public function index(){

        // mengambil data dari table balita
        $balita = DB::table('balitas')
        ->join('posyandus','balitas.ID_POSYANDU','=','posyandus.ID_POSYANDU')
        ->where('NIK_ORANG_TUA',Auth::user()->NIK)
        ->get();

        // mengirim data balita ke view index
        return view('dashboard.balitaparent',['balita' => $balita]);

    }
}
