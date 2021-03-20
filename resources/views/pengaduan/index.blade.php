@extends('layout')

@section('title', ' Daftar Pengaduan | Sistem Pengaduan Masyarakat')
@section('content')
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-center">
                    <strong>Daftar Pengaduan Yang Masuk</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Status</th>
                                    @auth('petugas')                                        
                                    <th>Ubah Status</th>
                                    @endauth
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengaduan as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->judul_pengaduan}}</td>
                                    <td>{{$item->tanggal_pengaduan}}</td>
                                    <td>
                                        @if ($item->status === '0')
                                        <div class="badge badge-danger">Belum Terverifikasi</div>
                                    </td>
                                    @elseif($item->status == 'proses')
                                        <div class="badge badge-warning text-white">Sedang Di Proses</div>
                                    </td>
                                    @else
                                        <div class="badge badge-success">Selesai</div>
                                    @endif
                                    </td>
                                    @auth('petugas')
                                    <td>
                                        @if ($item->status == 'proses')
                                        <a href="{{route('pengaduan.setStatus', \Crypt::Encrypt($item->id))}}?status=selesai"
                                            class="btn btn-warning"
                                            onclick="return confirm('Apakah anda yakin untuk mengubah status pengaduan ini?')">Ubah
                                            Status ke <strong>Sukses</strong></a>
                                        @elseif($item->status == '0')
                                        <button class="btn btn-info" disabled>Status Belum Bisa Diubah ke
                                            <strong>Sukses</strong></button>
                                        @else
                                         <button class="btn btn-success" disabled>Sukses</strong></a>
                                        @endif
                                    </td>
                                    @endauth
                                    <td>
                                        <a href="{{route('pengaduan.show', \Crypt::Encrypt($item->id))}}"
                                            class="btn btn-sm btn-primary mx-2 my-2">Detail</a>
                                        @auth('petugas')
                                        <a href="{{url('tanggapan/' . \Crypt::Encrypt($item->id))}}"
                                          class="btn btn-info btn-sm mx-2 my-2">Tanggapi</a>
                                        @endauth
                                    </td>
                                </tr>
                                {{ $pengaduan->links() }}
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">Data Pengaduan Tidak tersedia</td>
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
