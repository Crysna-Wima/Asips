<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class balitauserController extends Controller
{
    public function count(){
        $jumlah = DB::table('balitas')->count();
        return $jumlah;
    }
    public function index(){

        // mengambil data dari table balita
        $posyandu = DB::table('posyandus')->get();
        $users = DB::table('users')->where('level', 'parent')->get();
        $balita = DB::table('balitas')
            ->join('posyandus', 'balitas.ID_POSYANDU', '=', 'posyandus.ID_POSYANDU')
            ->join('users', 'balitas.NIK_ORANG_TUA', '=', 'users.NIK')
            ->where('balitas.DELETED_AT',null)
            ->get(); 

        // mengirim data balita ke view index
        return view('dashboard.balitauser')->with('balita',$balita)->with('posyandu', $posyandu)->with('users',$users);

    }

    public function print(){
        $balita = DB::table('balitas')
            ->join('posyandus', 'balitas.ID_POSYANDU', '=', 'posyandus.ID_POSYANDU')
            ->join('users', 'balitas.NIK_ORANG_TUA', '=', 'users.NIK')
            ->where('balitas.DELETED_AT',null)
            ->get();
        return view('print.balitaprint')->with('balita',$balita);
    }

    public function restore(){
        $restorebalita = DB::table('balitas as a')
            ->select('a.*','b.NAMA_POSYANDU as posyandu','c.name as nama')
            ->join('posyandus as b', 'a.ID_POSYANDU', '=', 'b.ID_POSYANDU')
            ->join('users as c', 'a.NIK_ORANG_TUA', '=', 'c.NIK')
            ->where('a.DELETED_AT','!=',null)            
            ->get();
        return view('restore.restoreBalitauser',['restorebalita' => $restorebalita]);
    }

    public function tambah(){
	    return view('tambah.tambahBalita');
    }

    public function store(Request $request){
        $request ->validate([
            'posyandu' => 'required|exists:posyandus,ID_POSYANDU'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('balitas')->insert([
            'ID_POSYANDU' => $request->posyandu,
            'NAMA_BALITA' => strtoupper($request->nama),
            'NIK_ORANG_TUA' => $request->NIK,
            'TGL_LAHIR_BALITA' => $request->lahir,
            'JENIS_KELAMIN_BALITA' => $request->jk,
            'STATUS' => $request->status,
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/balitauser')->with('tambah','Data berhasil ditambahkan');
    }
    public function edit($id){
        $posyandu = DB::table('posyandus')->get();
        $balita = DB::table('balitas')->where('ID_BALITA',$id)->get();
        $users = DB::table('users')->where('level', 'parent')->get();
        return view('edit.editBalitauser')->with('balita',$balita)->with('posyandu', $posyandu)->with('users',$users);
    }
    public function update(Request $request){
        $request ->validate([
            'posyandu' => 'required|exists:posyandus,ID_POSYANDU'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('balitas')->where('ID_BALITA',$request->id)->update([
            'ID_POSYANDU' => $request->posyandu,
            'NAMA_BALITA' => strtoupper($request->nama),
            'NIK_ORANG_TUA' => $request->NIK,
            'TGL_LAHIR_BALITA' => $request->lahir,
            'JENIS_KELAMIN_BALITA' => $request->jk,
            'STATUS' => $request->status,
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/balitauser')->with('edit','Data berhasil diubah');
    }
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('balitas')->where('ID_BALITA',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
    	return redirect('/balitauser')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('balitas')->where('ID_BALITA',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/balitauser')->with('back','Data berhasil dipulihkan');
    }
}