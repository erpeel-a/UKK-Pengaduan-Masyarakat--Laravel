<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:masyarakat')->only(['create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengaduan.index', [
          'pengaduan' => Pengaduan::with('masyarakat')->orderby('created_at', 'desc')->paginate(10),
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'judul_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required|image|mimes:jpg,png,gif,jpeg,svg|max:2048'
        ]);
        $file = $request->file('foto');
        $berkas = $file->move('uploads/berkas_pendukung/', time() . '-' . Str::limit(Str::slug(request()->judul_pengaduan), 50, '') . '-' . strtotime('now') . '.' . $file->getClientOriginalExtension());
        $data['foto'] = $berkas;
        Pengaduan::create([
            'judul_pengaduan' => $request->judul_pengaduan,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $berkas,
            'tanggal_pengaduan' => now(),
            'nik' => $request->nik,
            'status' => '0'
        ]);
        return redirect()->back()->with('status', 'Data Pengaduan Berhasil dikirim');
    }

    /**
     * memberi tanggapan.  
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $dec = Crypt::Decrypt($id);
    //    update status pengduan
        Pengaduan::where('id',$dec)->update(['status' => 'proses']);
        return view('pengaduan.create_tanggapan', ['pengaduan' => Pengaduan::with('tanggapan')->where('id', $dec)->first()]);
    }
 /**
     * detail pengaduan.  
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $dec = Crypt::Decrypt($id);
        return view('pengaduan.detail', ['pengaduan' => Pengaduan::with('tanggapan')->where('id', $dec)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
