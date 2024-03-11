
@extends('layouts.lay')

@section('title','laporan')
@section('content')
<div class="row">
	<div class="mt-2">
        <div class="card">
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
            <h1 class="h3 mb-0 text-gray-800 mt-1">Laporan Buku</h1>
            
        </div>
        <div class="card-body ">        
            <table id="table-data" class="table table-striped table-hover table-akuhh">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Anggota</th>
                        <th>Nama Lengkap</th>
                        <th>Kode Buku</th>
                        <th>Buku</th>
                        <th>tanggal Peminjam</th>
                        <th>Tenggat Kembali</th>
                        <th>Tanggal Dikembalikan</th>
                        <th>Status</th>
                        <th>Denda</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach ($log as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->user->kode_anggota }}</td>
                        <td>{{ $a->user->nama_lengkap }}</td>
                        <td>{{ $a->buku->buku_kode }}</td>
                        <td>{{ $a->buku->judul }}</td>
                        <td>{{ $a->waktu_pinjam }}</td>
                        <td>{{ $a->waktu_kembali }}</td>
                        <td>{{ $a->actual_waktu_kembali }}</td>
                        <td >{{ $a->actual_waktu_kembali == null ? 'dipinjam' : ($a->waktu_kembali < $a->actual_waktu_kembali ? 'telat mengembalikan' : 'dikembalikan' ) }}</td>
                        <td>{{ $a->actual_waktu_kembali == null ? '0' : ($a->waktu_kembali < $a->actual_waktu_kembali ? $a->denda->nama_denda : '0' ) }}</td>

                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
    </div>
</div>
</div>
@endsection