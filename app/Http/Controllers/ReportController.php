<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
class ReportController extends Controller
{
    public function index()
    {
        $tanggapan = Tanggapan::with(['petugas', 'pengaduan'])->get();
        return view('pengaduan.report', compact('tanggapan'));    
    }

    public function generate_report()
    {
        $tanggapan = Tanggapan::with(['petugas', 'pengaduan'])->get();
        return view('pengaduan.generate_report', compact('tanggapan'));  
    }
}
