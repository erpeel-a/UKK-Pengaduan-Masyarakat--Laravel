@extends('layout')

@section('title', 'Sistem Pengaduan Masyarakat')
@section('content')
  <div class="container mt-5">
    <div class="row mt-5 justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header">
              Silahkan Login untuk berpartisipasi
          </div>
          <div class="card-body mx-auto">
              <a href="{{url('/masyarakat/login')}}" class="btn btn-danger">Login Masyarakat</a>
              <a href="{{url('/petugas/login')}}" class="btn btn-info">Login Petugas</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
