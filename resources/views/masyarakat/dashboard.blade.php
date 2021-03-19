@extends('layout')

@section('title', 'Sistem Pengaduan Masyarakat')
@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header">
              <strong>Selamat datang, {{\Auth::guard('masyarakat')->user()->nama}}</strong>
          </div>
          <div class="card-body">
            No Content
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
