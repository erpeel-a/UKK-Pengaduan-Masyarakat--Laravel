@extends('layout')

@section('title', 'Register Masyarakat | Sistem Pengaduan Masyarakat')
@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        @if (session('status'))
            <div class="alert alert-success"><strong>{{session('status')}}</strong></div>
        @endif
        <div class="card shadow">
          <div class="card-header">
              <strong>Register Masyarakat</strong>
          </div>
          <div class="card-body">
              <form action="{{url('/masyarakat/register')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="username">NIK</label>
                  <input type="number" class="form-control @error('nik') is-invalid @enderror" size="16" name="nik" placeholder="masukan nik anda" value="{{old('nik')}}">
                  @error('nik') 
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
                </div>
                <div class="form-group">
                  <label for="username">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror"  name="nama" placeholder="masukan Nama anda" value="{{old('nama')}}">
                  @error('nama') 
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
                </div>
                <div class="form-group">
                  <label for="username">No Telp</label>
                  <input type="number" class="form-control @error('no_telp') is-invalid @enderror"  name="no_telp" placeholder="masukan Nama anda" value="{{old('no_telp')}}">
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
                <button type="submit" class="btn btn-primary mt-2">Register</button>
                <a href="{{url('/')}}" class="btn btn-danger mt-2">kembali</a>
                <a href="{{url('masyarakat/login')}}" class="my-2 float-right">Sudah Punya Akun ?</a>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
