{{-- @extends('layout')

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
              <li class="list-group-item"><strong>Judul Pengaduan</strong> : <div class="float-right">{{$pengaduan->judul_pengaduan}}</div></li>
              <li class="list-group-item"><strong>Tanggal Pengadun</strong>: <div class="float-right">{{$pengaduan->tanggal_pengaduan}}</div></li>
              <li class="list-group-item"><strong>Nama Pelapor</strong>: <div class="float-right">{{$pengaduan->masyarakat->nama}}</div></li>
              <li class="list-group-item"><strong>Isi Laporan</strong><textarea class="form-control" readonly id="" cols="30" rows="10">{{$pengaduan->isi_laporan}}</textarea></li>
              @if ($pengaduan->foto)
                <li class="list-group-item"><strong>Foto</strong>: <img src="{{asset($pengaduan->foto)}}" width="400px" height="300px" class="img-thumbnail" alt=""></li>
              @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="my-2 text-center"><strong>Tanggapan</strong></div>
          </div>
          <div class="card-body">
            @if ($pengaduan->tanggapan)
              <label for="">Petugas : {{$pengaduan->tanggapan->petugas->nama_petugas}}</label>
                  <textarea readonly class="form-control" cols="30" rows="10">{{$pengaduan->tanggapan->tanggapan}}</textarea>
               @else
               <li class="list-group-item">
                  <div class="alert alert-danger">Pengaduan belum di Tanggapi</div>
                </li>
              @endif
            <a class="btn btn-primary my-2" href="{{route('pengaduan.index')}}">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection --}}
@extends('layout')

@section('title', 'Sistem Pengaduan Masyarakat | Kirim Tanggapan')
@section('content')
  <div class="container mt-5">
    <div class="row mt-5 justify-content-center">
      <div class="col-md-6">
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="card shadow">
          <div class="card-header text-center">
              <strong>Tulis Tanggapan</strong>
          </div>
          <div class="card-body">
              <form action="#">
                <div class="form-group">
                  <label for="">Judul Pengaduan</label>
                  <input type="text" readonly class="form-control @error('judul_pengaduan') is-invalid @enderror" name="judul_pengaduan" placeholder="Judul Pengaduan Anda" value="{{$pengaduan->judul_pengaduan}}">
                </div>
                <div class="form-group">
                  <label for="">Nama Pelapor</label>
                  <input type="text" readonly class="form-control @error('judul_pengaduan') is-invalid @enderror" name="judul_pengaduan" placeholder="Judul Pengaduan Anda" value="{{$pengaduan->judul_pengaduan}}">
                </div>
                <div class="form-group">
                  <label for="">NIK</label>
                  <input type="text" readonly class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{$pengaduan->nik}}" readonly>
                </div>
                <div class="form-group">
                  <label for="">Isi pengaduan</label>
                  <textarea name="isi_laporan" readonly class="form-control @error('isi_laporan') is-invalid @enderror" id="" cols="30" rows="10">{{$pengaduan->isi_laporan}}</textarea>
                </div>
                <div class="form-group">
                  <label for="">Foto / Berkas Pendukung</label>
                  @if ($pengaduan->foto)
                    <img src="{{asset($pengaduan->foto)}}" width="400px" height="300px" alt="">
                  @endif
                </div>
                <div class="form-group">
                  <label for="">Tanggal Melapor</label>
                  <input type="text" name="tanggal_pengaduan" readonly value="{{$pengaduan->tanggal_pengaduan}}" class="form-control @error('tanggal_pengaduan') is-invalid @enderror">
                </div>
              </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header">
            <strong>Tanggapan</strong>
          </div>
          <div class="card-body">
            status laporan :   
            @if ($pengaduan->status === '0')
                <div class="badge badge-danger my-2">Belum Terverifikasi</div></td>
              @elseif($pengaduan->status == 'proses')
                <div class="badge badge-warning">Sedang Di Proses</div></td>
              @else
                <div class="badge badge-success">Selesai</div></td>
              @endif
            <form action="{{url('tanggapan/'. $pengaduan->id)}}" method="post">
              @csrf
              <textarea name="tanggapan" class="form-control @error('tanggapan') is-invalid @enderror" id="" @if ($pengaduan->status == 'selesai') disabled @endif required cols="30" rows="10">@if($pengaduan->tanggapan){{$pengaduan->tanggapan->tanggapan}}@endif</textarea>
              @error('tanggapan')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
              <button class="btn btn-primary my-2" @if($pengaduan->tanggapan) disabled @endif>Kirim Tanggapan</button>
              <a href="{{route('pengaduan.index')}}" class="btn btn-danger">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
