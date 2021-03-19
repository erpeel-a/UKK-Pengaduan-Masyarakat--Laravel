<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login_masyarakat()
    {
        return view('auth.login_masyarakat');
    } 

    public function hadleLoginMasyarakat(Request $request)
    {
        if(Auth::guard('masyarakat')->attempt(['username' => $request->username,'password' => $request->password])){
            return redirect('/home/masyarakat');
        }else{
            return redirect()->back()->wihh('status', 'Username atau Password anda Salah');
        }
    } 

    public function login_petugas()
    {
        return view('auth.login_petugas');
    } 


    public function hadleLoginPetugas(Request $request)
    {
        if(Auth::guard('petugas')->attempt(['username' => $request->username,'password' => $request->password])){
            return redirect('/home/petugas');
        }else{
            return redirect()->back()->wihh('status', 'Username atau Password anda Salah');
        }
    } 

    public function logout_masyarakat()
    {
        Auth::guard('masyarakat')->logout();
        return redirect('/')->with('status', 'Logout Berhasil');
    }

    public function logout_petugas()
    {
        Auth::guard('petugas')->logout();
        return redirect('/')->with('status', 'Logout Berhasil');
    }
}
