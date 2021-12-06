<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class roleController extends Controller
{
    public function index(){

        // mengambil data dari table role
        $role = DB::table('role')->where('DELETED_AT',null)->get();

        // mengirim data role ke view index
        return view('dashboard.role',['role' => $role]);

    }

    public function restore(){
        $restorerole = DB::table('role')->where('DELETED_AT','!=',null)->get();
        return view('restore.restoreRole',['restorerole' => $restorerole]);
    }


    public function tambah(){
	    return view('tambah.tambahRole');
    }

    public function store(Request $request){
        $request ->validate([
            'role' => 'required|max:20'
        ]);
        DB::table('role')->insert([
            'ROLE' => $request->role,
        ]);
        return redirect('/role')->with('tambah','Data berhasil ditambahkan');
    }

    public function edit($id){
        $role = DB::table('role')->where('ID_ROLE',$id)->get();
        return view('edit.editRole',['role' => $role]);
    }
    public function update(Request $request){
        $request ->validate([
            'role' => 'required|max:20'
        ]);
        DB::table('role')->where('ID_ROLE',$request->id)->update([
            'ROLE' => $request->role,
        ]);
        return redirect('/role')->with('edit','Data berhasil diubah');
    } 
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('role')->where('ID_ROLE',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/role')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('role')->where('ID_ROLE',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/role')->with('back','Data berhasil dipulihkan');
    }

 
}