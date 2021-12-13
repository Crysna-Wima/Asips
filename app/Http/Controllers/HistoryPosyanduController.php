<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryPosyanduController extends Controller
{
    public function index(){

        // mengambil data dari table balita
        $balita = DB::table('balitas')->get();
        $user = DB::table('users')->where('level','parent')->get();

        $history = DB::table('history_posyandus')
            ->join('balitas', 'history_posyandus.ID_BALITA', '=', 'balitas.ID_BALITA')
            ->where('history_posyandus.DELETED_AT',null)
            ->join('users', 'history_posyandus.ID_USER', '=', 'id')
            ->get(); 
        // mengirim data balita ke view index
        return view('dashboard.historyPosyandu',['history' => $history],['user' => $user, 'balita' =>$balita]);

    }

    public function restore(){
        $restorehistory = DB::table('history_posyandus')->where('DELETED_AT','!=',null)->get();
        return view('restore.restoreHistoryPosyandu',['restorehistory' => $restorehistory]);
    }

    public function store(Request $request){
        $request ->validate([
            'id_balita' => 'required|exists:balitas,ID_BALITA',
            'id_user' => 'required|exists:users,id',
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('history_posyandus')->insert([
            'ID_BALITA' => $request->id_balita,
            'ID_USER' => $request->id_user,
            'TINGGI_BADAN' => $request->tinggi_badan,
            'TGL_POSYANDU' => $request->tgl_posyandu,
            'BERAT_BADAN_BALITA' => $request->berat_badan,
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/historyPosyandu')->with('tambah','Data berhasil ditambahkan');
    }
    public function edit($id){
        $balita = DB::table('balitas')->get();
        $user = DB::table('users')->where('level','parent')->get();

        $history = DB::table('history_posyandus')
            ->join('balitas', 'history_posyandus.ID_BALITA', '=', 'balitas.ID_BALITA')
            ->where('DELETED_AT',null)
            ->join('users', 'history_posyandus.ID_USER', '=', 'id')
            ->get(); 
        
        return view('edit.editHistoryPosyandu',['history' => $history,'user' => $user, 'balita' =>$balita]);
    }
    public function update(Request $request){
        $request ->validate([
            'id_balita' => 'required|exists:balitas,ID_BALITA',
            'id_user' => 'required|exists:users,id',
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('history_posyandus')->where('ID_HISTORY_POSYANDU',$request->id)->update([
            'ID_BALITA' => $request->id_balita,
            'ID_USER' => $request->id_user,
            'TINGGI_BADAN' => $request->tinggi_badan,
            'TGL_POSYANDU' => $request->tgl_posyandu,
            'BERAT_BADAN_BALITA' => $request->berat_badan,
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/historyPosyandu')->with('edit','Data berhasil diubah');
    }
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('history_posyandus')->where('ID_HISTORY_POSYANDU',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
    	return redirect('/historyPosyandu')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('history_posyandus')->where('ID_HISTORY_POSYANDU',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/historyPosyandu')->with('back','Data berhasil dipulihkan');
    }


}