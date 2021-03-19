<?php

namespace App\Http\Controllers;

use App\Models\{Tanggapan,Pengaduan};
use Illuminate\Http\Request;
class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('pengaduan.create_tanggapan', [
           'pengaduan' => Pengaduan::with('tanggapan')->where('id', $id)->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pengaduan_id)
    {
        Tanggapan::create([
            'id_pengaduan' => $pengaduan_id,
            'tanggal_pengaduan' => now(),
            'tanggapan' => $request->tanggapan,
            'id_petugas' => \Auth::guard('petugas')->user()->id
        ]);
        $pengaduan = Pengaduan::findOrfail($pengaduan_id);
        $pengaduan->status = 'proses';
        $pengaduan->save();

        return redirect()->back()->with('status', 'Tanggapan Berhasil dikirim');
        // return $reque
    }


    /**
     * Set Status Pengaduan.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function SetStatus(Request $request,$pengaduan_id)
    {
        $request->validate([
            'status' => 'required|in:selesai',
        ]);
        $pengaduan = Pengaduan::findOrfail($pengaduan_id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('status', 'Status Pengaduan Berhasil diubah');
    }
}
