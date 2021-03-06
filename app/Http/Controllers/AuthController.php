<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function proses_login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $kredensil =$request->only('username','password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if($user->DELETED_AT == null){
                if ($user->level == 'admin') {
                    return redirect()->intended('admin');
                }elseif ($user->level == 'editor') {
                    return redirect()->intended('editor');
                }elseif ($user->level == 'parent'){
                    return redirect()->intended('parent');
                }
            }

            return redirect()->intended('/login');
        }
        return redirect('/login');
    }   

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}

