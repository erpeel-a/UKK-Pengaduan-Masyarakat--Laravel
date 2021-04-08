<?php

namespace App\Http\Controllers;

use App\Models\{Tanggapan,Pengaduan};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $dec = Crypt::Decrypt($id);
        return view('pengaduan.create_tanggapan', [
           'pengaduan' => Pengaduan::with('tanggapan')->where('id', $dec)->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate(['tanggapan' => 'required']);
        Tanggapan::create([
            'id_pengaduan' => $id,
            'tanggal_tanggapan' => now(),
            'tanggapan' => $request->tanggapan,
            'id_petugas' => \Auth::guard('petugas')->user()->id
        ]);
        $pengaduan = Pengaduan::where(['id' => $id])->update(['status' => 'selesai']);
        // dd($pengaduan);
        return redirect()->route('pengaduan.index')->with('status', 'Tanggapan Berhasil dikirim');
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
        $dec = Crypt::Decrypt($pengaduan_id);
        $pengaduan = Pengaduan::findOrfail($dec);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('status', 'Status Pengaduan Berhasil diubah');
    }
}
