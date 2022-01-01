<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryPosyanduuserController extends Controller
{
    public function index(){

        // mengambil data dari table balita
        $balita = DB::table('balitas')->get();
        $user = DB::table('users')->where('level','parent')->get();

        $history = DB::table('history_posyandus')
            ->join('balitas', 'history_posyandus.ID_BALITA', '=', 'balitas.ID_BALITA')
            ->join('users', 'balitas.NIK_ORANG_TUA', '=','users.NIK')
            ->where('history_posyandus.DELETED_AT',null)
            ->get(); 
        // mengirim data balita ke view index
        return view('dashboard.historyPosyanduuser',['history' => $history],['user' => $user, 'balita' =>$balita]);

    }

    public function print(){
        $history = DB::table('history_posyandus')
            ->join('balitas', 'history_posyandus.ID_BALITA', '=', 'balitas.ID_BALITA')
            ->join('users', 'balitas.NIK_ORANG_TUA', '=','users.NIK')
            ->where('history_posyandus.DELETED_AT',null)
            ->get(); 
        return view('print.historiprint')->with('history',$history);
    }

    public function restore(){
        $restorehistory = DB::table('history_posyandus as a')
        ->select('a.*', 'b.NAMA_BALITA as balita', 'c.name as nama')
        ->join('balitas as b', 'a.ID_BALITA', '=', 'b.ID_BALITA')
        ->join('users as c', 'b.NIK_ORANG_TUA', '=','c.NIK')
        ->where('a.DELETED_AT','!=',null)
        ->get();
        return view('restore.restoreHistoryPosyanduuser',['restorehistory' => $restorehistory]);
    }

    public function store(Request $request){
        $request ->validate([
            'id_balita' => 'required|exists:balitas,ID_BALITA',
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('history_posyandus')->insert([
            'ID_BALITA' => $request->id_balita,
            'TINGGI_BADAN' => $request->tinggi_badan,
            'TGL_POSYANDU' => $request->tgl_posyandu,
            'BERAT_BADAN_BALITA' => $request->berat_badan,
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/historyPosyanduuser')->with('tambah','Data berhasil ditambahkan');
    }
    public function edit($id){
        $balita = DB::table('balitas')->get();
        $history = DB::table('history_posyandus')->where('ID_HISTORY_POSYANDU',$id)->get();
        
        return view('edit.editHistoryPosyanduuser',['history' => $history, 'balita' =>$balita]);
    }
    public function update(Request $request){
        $request ->validate([
            'id_balita' => 'required|exists:balitas,ID_BALITA',
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('history_posyandus')->where('ID_HISTORY_POSYANDU',$request->id)->update([
            'ID_BALITA' => $request->id_balita,
            'TINGGI_BADAN' => $request->tinggi_badan,
            'TGL_POSYANDU' => $request->tgl_posyandu,
            'BERAT_BADAN_BALITA' => $request->berat_badan,
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/historyPosyanduuser')->with('edit','Data berhasil diubah');
    }
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('history_posyandus')->where('ID_HISTORY_POSYANDU',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
    	return redirect('/historyPosyanduuser')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('history_posyandus')->where('ID_HISTORY_POSYANDU',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/historyPosyanduuser')->with('back','Data berhasil dipulihkan');
    }


}