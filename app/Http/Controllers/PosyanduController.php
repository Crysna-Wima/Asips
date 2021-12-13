<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class posyanduController extends Controller
{
    public function index(){

        // mengambil data dari table posyandu
        // $posyandu = DB::table('posyandus')->where('DELETED_AT',null)->get();
        $kelurahan = DB::table('kelurahans')->get();
        $posyandu = DB::table('posyandus')
            ->join('kelurahans', 'posyandus.ID_KELURAHAN', '=', 'kelurahans.ID_KELURAHAN')
            ->where('posyandus.DELETED_AT',null)
            ->get(); 

        // mengirim data posyandu ke view index
        return view('dashboard.posyandu',['posyandu' => $posyandu],['kelurahan' =>$kelurahan]);

    }

    public function restore(){
        $restoreposyandu = DB::table('posyandus')->where('DELETED_AT','!=',null)->get();
        return view('restore.restorePosyandu',['restoreposyandu' => $restoreposyandu]);
    }

    public function tambah(){
	    return view('tambah.tambahPosyandu');
    }

    public function store(Request $request){
        $request ->validate([
            'kelurahan' => 'required|exists:kelurahans,ID_KELURAHAN',
            'nama' => 'required|max:50|min:3',
            'alamat' => 'required|max:300|min:3'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('posyandus')->insert([
            'ID_KELURAHAN' => $request->kelurahan,
            'NAMA_POSYANDU' => $request->nama,
            'ALAMAT_POSYANDU' => $request->alamat,
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/posyandu')->with('tambah','Data berhasil ditambahkan');
    }

    public function edit($id){
        $kelurahan = DB::table('kelurahans')->get();
        $posyandu = DB::table('posyandus')->where('ID_POSYANDU',$id)->get();
        return view('edit.editPosyandu',['posyandu' => $posyandu],['kelurahan' =>$kelurahan]);
    }
    public function update(Request $request){
        $request ->validate([
            'kelurahan' => 'required|exists:kelurahans,ID_KELURAHAN',
            'nama' => 'required|max:50|min:3',
            'alamat' => 'required|max:300|min:3'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('posyandus')->where('ID_POSYANDU',$request->id)->update([
            'ID_KELURAHAN' => $request->kelurahan,
            'NAMA_POSYANDU' => $request->nama,
            'ALAMAT_POSYANDU' => $request->alamat,
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/posyandu')->with('edit','Data berhasil diubah');
    }
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('posyandus')->where('ID_POSYANDU',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/posyandu')->with('hapus','Data berhasil dihapus');
    }
    
    public function back($id){
        DB::table('posyandus')->where('ID_POSYANDU',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/posyandu')->with('back','Data berhasil dipulihkan');
    }

}
