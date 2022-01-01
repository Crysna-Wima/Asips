<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kelurahanController extends Controller
{
    public function count(){
        $jumlah = DB::table('kelurahans')->count();
        return $jumlah;
    }
    public function index(){

        // mengambil data dari table kelurahan
        $kecamatan = DB::table('kecamatans')->get();
        $kelurahan = DB::table('kelurahans')
            ->join('kecamatans', 'kelurahans.ID_KECAMATAN', '=', 'kecamatans.ID_KECAMATAN')
            ->where('kelurahans.DELETED_AT',null)
            ->get(); 

        // mengirim data kelurahan ke view index
        return view('dashboard.kelurahan',['kelurahan' => $kelurahan],['kecamatan' =>$kecamatan]);
    }

    public function restore(){
        $restorekelurahan = DB::table('kelurahans as a')
            ->select('a.*', 'b.KECAMATAN as nama')
            ->join('kecamatans as b', 'a.ID_KECAMATAN', '=', 'b.ID_KECAMATAN')
            ->where('a.DELETED_AT','!=',null)
            ->get(); 

        return view('restore.restoreKelurahan',['restorekelurahan' => $restorekelurahan]);
    }


    public function store(Request $request){
        $request ->validate([
            'id_kecamatan' => 'required|exists:kecamatans,ID_KECAMATAN',
            'kelurahan' => 'required|max:20|min:3'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('kelurahans')->insert([
            'ID_KECAMATAN' => $request->id_kecamatan,
            'KELURAHAN' => strtoupper($request->kelurahan),
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/kelurahan')->with('tambah','Data berhasil ditambahkan');
    }
    public function edit($id){
            $kecamatan = DB::table('kecamatans')->get();
            $kelurahan = DB::table('kelurahans')->where('ID_KELURAHAN',$id)->get();
            return view('edit.editKelurahan',['kelurahan' => $kelurahan],['kecamatan' =>$kecamatan]);
        }
    public function update(Request $request){
        $request ->validate([
            'id_kecamatan' => 'required|exists:kecamatans,ID_KECAMATAN',
            'kelurahan' => 'required|max:20|min:3'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('kelurahans')->where('ID_KELURAHAN',$request->id)->update([
            'ID_KECAMATAN' => $request->id_kecamatan,
            'KELURAHAN' => strtoupper($request->kelurahan),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/kelurahan')->with('edit','Data berhasil diubah');
    } 
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('kelurahans')->where('ID_KELURAHAN',$id)
        ->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/kelurahan')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('kelurahans')->where('ID_KELURAHAN',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/kelurahan')->with('back','Data berhasil dipulihkan');
    }

   
}
