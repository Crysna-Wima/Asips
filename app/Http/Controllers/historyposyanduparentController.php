<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class historyposyanduparentController extends Controller
{
    public function index(){
        $history = DB::table('history_posyandus')->where('ID_USER',Auth::user()->id)->get();
        return view('dashboard.historyPosyanduparent',['history' => $history]);

    }
}
