@extends('layout')

@section('title', 'Tambah Petugas | Sistem Pengaduan Masyarakat')
@section('content')
  <div class="container mt-5">
    <div class="row mt-5 justify-content-center">
      <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="card shadow">
          <div class="card-header text-left">
              <strong>Tambah Data petugas</strong>
          </div>
          <div class="card-body">
            <form action="{{route('petugas.store')}}" method="post">
              @csrf
              <div class="form-group">
                <label for="username">Nama Petugas</label>
                <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror"  name="nama_petugas" placeholder="masukan nama_petugas anda" value="{{old('nama_petugas')}}">
                @error('nama_petugas') 
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="username">No Telp</label>
                <input type="number" class="form-control @error('no_telp') is-invalid @enderror"  name="no_telp" placeholder="masukan No Telp anda" value="{{old('no_telp')}}">
                @error('no_telp') 
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="masukan username anda">
                @error('username') 
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
              </div>
              <div class="form-group">
                <label for="username">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="masukan password anda">
                @error('password') 
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="username">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="masukan password sekali lagi">
                @error('password') 
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="username">Role Petugas</label>
                <select name="level" class="form-control @error('level') is-invalid @enderror" id="">
                  <option value="">--Pilih Role--</option>
                  <option value="admin">admin</option>
                  <option value="petugas">petugas</option>
                </select>
                @error('level') 
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
              </div>
              <button type="submit" class="btn btn-primary mt-2">Register</button>
              <a href="{{url('petugas')}}" class="btn btn-danger mt-2">kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
