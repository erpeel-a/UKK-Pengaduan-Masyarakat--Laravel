@extends('layout')

@section('title', 'Sistem Pengaduan Masyarakat | Detail Pengaduan')
@section('content')
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <strong>Detail Pengaduan</strong>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Judul Pengaduan</strong> : <div class="float-right">
                                {{$pengaduan->judul_pengaduan}}</div>
                        </li>
                        <li class="list-group-item"><strong>Tanggal Pengadun</strong>: <div class="float-right">
                                {{$pengaduan->tanggal_pengaduan}}</div>
                        </li>
                        <li class="list-group-item"><strong>Nama Pelapor</strong>: <div class="float-right">
                                {{$pengaduan->masyarakat->nama}}</div>
                        </li>
                        <li class="list-group-item"><strong>Isi Laporan</strong><textarea class="form-control" readonly
                                id="" cols="30" rows="10">{{$pengaduan->isi_laporan}}</textarea></li>
                        @if ($pengaduan->foto)
                        <li class="list-group-item"><strong>Foto</strong>: <img src="{{asset($pengaduan->foto)}}"
                                width="400px" height="300px" class="img-thumbnail" alt=""></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="my-2 text-center"><strong>Tanggapn</strong></div>
                </div>
                <div class="card-body">
                    @if ($pengaduan->tanggapan)
                    <label for="">Petugas : {{$pengaduan->tanggapan->petugas->nama_petugas}}</label>
                    <textarea readonly class="form-control" cols="30" disabled rows="10" @if ($pengaduan->status == '0' || $pengaduan->status == 'proses')
                      disabled @endif>{{$pengaduan->tanggapan->tanggapan}}</textarea>
                    @else
                        <div class="alert alert-danger">Pengaduan belum di Tanggapi</div>
                    @endif
                    <a class="btn btn-primary my-2" href="{{route('pengaduan.index')}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
