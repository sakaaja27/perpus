@extends('layouts.lay')
@section('title','Pengembalian')
@section('content')
<div class="col-md-12 mx-auto" >
	<div class="mt-1">
		@if (session('message'))
          <div class="alert {{session('alert-class')}} " role="alert">
            {{session('message') }}

          </div>
        @endif
		@if (session('status'))
		<div class="alert alert-success " role="alert">
			{{session('status') }}
			
		</div>
		@endif
		@if ($errors->any())
		<div class="alert alert-danger ">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
	<div class="card">
		
		<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
			<h1 class="h3 mb-0 text-gray-800 mt-1">List Daftar Kembali</h1>
		</div>
		<div class="card-body ">
			<div class="d-flex justify-content-end">
			</div>
			<table id="table-data" class="table table-striped table-hover table-akuhh">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Buku</th>
						<th>Kode Anggota</th>
						<th>Nama </th>
						<th>tanggal Peminjam</th>
						<th>Tenggat Kembali</th>
						<th>Tanggal Dikembalikan</th>
						<th>Status</th>
						<th>Denda</th>
						<th>Aksi</th>
						

					</tr>
				</thead>
				<tbody>
					@foreach ($log as $a)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $a->buku->buku_kode }}</td>
						<td>{{ $a->user->kode_anggota }}</td>
						<td>{{ $a->user->nama_lengkap }}</td>
						<td>{{ $a->waktu_pinjam }}</td>
						<td>{{ $a->waktu_kembali }}</td>
						<td>{{ $a->actual_waktu_kembali }}</td>
						<td >{{ $a->actual_waktu_kembali == null ? 'dipinjam' : ($a->waktu_kembali < $a->actual_waktu_kembali ? 'telat mengembalikan' : 'dikembalikan' ) }}</td>
						<td>{{ $a->actual_waktu_kembali == null ? '0' : ($a->waktu_kembali < $a->actual_waktu_kembali ? $a->denda->nama_denda  : '0' ) }}</td>
						<td>
							<button class="btn btn-info btn-sm" > <a href="kembali-detail/{{$a->id}}"> <i class="fa fa-eye text-white"></i></a></button>
							<a href="kembali-delete/{{$a->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus ?');"> <i class="fa fa-trash text-white"></i></a>
						</td>
						
						


					</tr>
					@endforeach
				</tbody>
				
			</table>
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>
@endsection