@extends('layout')

@section('title', 'Sistem Pengaduan Masyarakat | Buat Pengaduan')
@section('content')
  <div class="container mt-5">
    <div class="row mt-5 justify-content-center">
      <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="card shadow">
          <div class="card-header text-center">
              <strong>Tulis Pengaduan Anda</strong>
          </div>
          <div class="card-body">
              <form action="{{url('pengaduan')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Judul Pengaduan</label>
                  <input type="text" class="form-control @error('judul_pengaduan') is-invalid @enderror" name="judul_pengaduan" placeholder="Judul Pengaduan Anda" value="{{old('judul_pengaduan')}}">
                  @error('judul_pengaduan')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">NIK</label>
                  <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{\Auth::guard('masyarakat')->user()->nik}}" readonly value="{{old('nik')}}"> 
                </div>
                <div class="form-group">
                  <label for="">Isi Laporan Anda</label>
                  <textarea name="isi_laporan" class="form-control @error('isi_laporan') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
                  @error('isi_laporan')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
                </div>
                <div class="form-group">
                  <label for="">Foto / Berkas Pendukung</label>
                  <input type="file" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror" placeholder="Masukkan Berkas Pendukung/Foto Jika ada">
                </div>
                @error('foto')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
                <button type="submit" class="btn btn-primary">Kirim</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
