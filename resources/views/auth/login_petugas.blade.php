@extends('layout')

@section('title', 'Login Petugas |Sistem Pengaduan Masyarakat')
@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        @if (session('status'))
            <div class="alert alert-danger">{{session('status')}}</div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger">{{session('danger')}}</div>
        @endif
        <div class="card shadow">
          <div class="card-header">
              <strong>Login Petugas</strong>
          </div>
          <div class="card-body">
              <form action="{{url('/petugas/login')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="masukan username anda">
                  @error('username')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <label for="username">Password</label>
                <input type="password" class="form-control @error('username') is-invalid @enderror" name="password" placeholder="masukan password anda">
                @error('password')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <button type="submit" class="btn btn-primary mt-2">Login</button>
                <a href="{{url('/')}}" class="btn btn-danger mt-2">kembali</a>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
