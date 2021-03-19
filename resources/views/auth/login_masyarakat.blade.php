@extends('layout')

@section('title', 'Login Masyarakat | Sistem Pengaduan Masyarakat')
@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        @if (session('status'))
            <div class="alert alert-success"><strong>{{session('status')}}</strong></div>
        @endif
        <div class="card shadow">
          <div class="card-header">
              <strong>Login Masyarakat</strong>
         
          </div>
          <div class="card-body">
              <form action="{{url('/masyarakat/login')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="masukan username anda">
                </div>
                <label for="username">Password</label>
                <input type="password" class="form-control" name="password" placeholder="masukan password anda">
                <button type="submit" class="btn btn-primary mt-2">Login</button>
                <a href="{{url('/')}}" class="btn btn-danger mt-2">kembali</a>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
