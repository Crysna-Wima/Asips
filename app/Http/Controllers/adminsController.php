<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class adminsController extends Controller
{
    public function index(){
        $admin = DB::table('users')->where('DELETED_AT',null)->where('level','admin')->get();
        return view('dashboard.admins',['admin' => $admin]);
    }
    public function store(Request $request){
        $request ->validate([
            'username' => 'required|max:20|min:3'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('users')->insert([
            'name' => strtoupper($request->name),
            'username' => $request->username,
            'email' => $request->email,
            'level' => 'admin',
            'password' => bcrypt($request->password),
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/admins')->with('tambah','Data berhasil ditambahkan');
    }
    public function edit($id){
        $admin = DB::table('users')->where('id',$id)->get();
        return view('edit.editAdmin',['admin' => $admin]);
    }
    public function update(Request $request){
        $request ->validate([
            'username' => 'required|max:20|min:3'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('users')->where('id',$request->id)->update([
            'name' => strtoupper($request->name),
            'username' => $request->username,
            'email' => $request->email,
            'level' => 'admin',
            'password' => bcrypt($request->password),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/admins')->with('edit','Data berhasil diubah');
    }
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('users')->where('id',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/admins')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('users')->where('id',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/admins')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restoreadmin = DB::table('users')->where('DELETED_AT','!=',null)->where('level','admin')->get();
        return view('restore.restoreAdmin',['restoreadmin' => $restoreadmin]);
    }
}
