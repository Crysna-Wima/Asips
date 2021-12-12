<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class balitauserController extends Controller
{
    public function index(){

        // mengambil data dari table balita
        $balita = DB::table('balitas')->where('DELETED_AT',null)->get();
        $jumlah = DB::table('posyandus')->count();

        // mengirim data balita ke view index
        return view('dashboard.balitauser',['balita' => $balita],['jumlah' =>$jumlah]);

    }

    public function restore(){
        $restorebalita = DB::table('balitas')->where('DELETED_AT','!=',null)->get();
        return view('restore.restoreBalitauser',['restorebalita' => $restorebalita]);
    }

    public function tambah(){
	    return view('tambah.tambahBalitauser');
    }

    public function store(Request $request){
        $request ->validate([
            'posyandu' => 'required|exists:posyandus,ID_POSYANDU'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('balitas')->insert([
            'ID_POSYANDU' => $request->posyandu,
            'NAMA_BALITA' => $request->nama,
            'NIK_ORANG_TUA' => $request->NIK,
            'NAMA_ORANG_TUA' => $request->Ortu,
            'TGL_LAHIR_BALITA' => $request->lahir,
            'JENIS_KELAMIN_BALITA' => $request->jk,
            'STATUS' => $request->status,
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/balitauser')->with('tambah','Data berhasil ditambahkan');
    }
    public function edit($id){
        $jumlah = DB::table('posyandus')->count();
        $balita = DB::table('balitas')->where('ID_BALITA',$id)->get();
        return view('edit.editBalitauser',['balita' => $balita],['jumlah' =>$jumlah]);
    }
    public function update(Request $request){
        $request ->validate([
            'posyandu' => 'required|exists:posyandus,ID_POSYANDU'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('balitas')->where('ID_BALITA',$request->id)->update([
            'ID_POSYANDU' => $request->posyandu,
            'NAMA_BALITA' => $request->nama,
            'NIK_ORANG_TUA' => $request->NIK,
            'NAMA_ORANG_TUA' => $request->Ortu,
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