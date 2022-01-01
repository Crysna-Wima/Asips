<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class parentsuserController extends Controller
{
    public function index(){
        $parent = DB::table('users')->where('DELETED_AT',null)->where('level','parent')->get();
        return view('dashboard.parentsuser',['parent' => $parent]);
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
            'level' => 'parent',
            'password' => bcrypt($request->password),
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/parentsuser')->with('tambah','Data berhasil ditambahkan');
    }
    public function edit($id){
        $parent = DB::table('users')->where('id',$id)->get();
        return view('edit.editParentuser',['parent' => $parent]);
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
            'level' => 'parent',
            'password' => bcrypt($request->password),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/parentsuser')->with('edit','Data berhasil diubah');
    }
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('users')->where('id',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/parentsuser')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('users')->where('id',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/parentsuser')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restoreparent = DB::table('users')->where('DELETED_AT','!=',null)->where('level','parent')->get();
        return view('restore.restoreparentuser',['restoreparent' => $restoreparent]);
    }
}
