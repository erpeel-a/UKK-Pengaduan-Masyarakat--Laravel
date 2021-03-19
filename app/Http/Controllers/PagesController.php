<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // if(\Auth::guard('petugas')){
        //     return redirect('home/petugas');
        // }else if(\Auth::guard('masyarakat')){
        //     return redirect('home/masyarakat');
        // }
        return view('home');
    }

    public function dashboard_masyarakat()
    {
        return view('masyarakat.dashboard');
    }
    public function dashboard_petugas()
    {
        return view('petugas.dashboard');
    }
}
