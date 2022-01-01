<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class historyposyanduparentController extends Controller
{
    public function index(){
        $history = DB::table('history_posyandus')
        ->join('balitas', 'history_posyandus.ID_BALITA', '=', 'balitas.ID_BALITA')
        ->join('posyandus','balitas.ID_POSYANDU','=','posyandus.ID_POSYANDU')
        ->where('history_posyandus.DELETED_AT',null)
        ->where('balitas.NIK_ORANG_TUA',Auth::user()->NIK)
        ->get(); 
        return view('dashboard.historyPosyanduparent',['history' => $history]);

    }
}
