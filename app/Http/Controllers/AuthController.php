<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Masyarakat;
class AuthController extends Controller
{

    public function login_masyarakat()
    {
        return view('auth.login_masyarakat');
    } 

    public function hadleLoginMasyarakat(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::guard('masyarakat')->attempt(['username' => $request->username,'password' => $request->password])){
            return redirect('/home/masyarakat');
        }else{
            return redirect()->back()->with('danger', 'Username atau Password anda Salah');
        }
    } 

    public function login_petugas()
    {
        return view('auth.login_petugas');
    } 


    public function hadleLoginPetugas(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::guard('petugas')->attempt(['username' => $request->username,'password' => $request->password])){
            return redirect('/home/petugas');
        }else{
            return redirect()->back()->with('danger', 'Username atau Password anda Salah');
        }
    } 

    /*
    * Register User
    */
    public function register_masyarakat(Request $request)
    {   
        return view('auth.register_masyarakat');
    }

    public function HandleRegisterMasyarakat(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:masyarakat',
            'nik' => 'required|size:16',
            'nama' => 'required',
            'password' => 'required|confirmed',
            'no_telp' => 'required|max:13'
        ]);
        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'no_telp' => $request->no_telp
        ]);
        return redirect('masyarakat/login')->with('status', 'Registrasi berhasil, Siliahkan login');
    }
    /*
    * Logout User
    *
    */

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
