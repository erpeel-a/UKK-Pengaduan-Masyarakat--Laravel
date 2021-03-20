@extends('layout')

@section('title', ' Daftar Petugas | Sistem Pengaduan Masyarakat')
@section('content')
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <div class="card shadow">
                <div class="card-header text-center">
                    <strong>Daftar Pengaduan Yang Masuk</strong>
                </div>
                <div class="card-body">
                    <a href="{{route('petugas.create')}}" class="btn my-2 btn-primary">Tambah Data Petugas</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>No Telp</th>
                                    <th>Level</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @forelse ($petugas as $item)
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama_petugas}}</td>
                                    <td>{{$item->no_telp}}</td>
                                    <td>{{$item->level}}</td>
                                    <td>
                                        <form action="{{route('petugas.destroy', $item->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                 </tr>
                                @empty
                                    <tr >
                                        <td colspan="5"></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
