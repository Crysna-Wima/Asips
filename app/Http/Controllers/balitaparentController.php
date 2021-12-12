<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class balitaparentController extends Controller
{
    public function index(){

        // mengambil data dari table balita
        $posyandu = DB::table('history_posyandus')->where('ID_USER', Auth::user()->id)->select('ID_HISTORY_POSYANDU')->get();
        $balita = DB::table('balitas')->whereIn('ID_BALITA',$posyandu)->get();
        // mengirim data balita ke view index
        return view('dashboard.balitaparent',['balita' => $balita]);

    }
}
