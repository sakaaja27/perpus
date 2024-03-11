@extends('layouts.lay')
@section('title','User')
@section('content')
<div class="row">
	<div class="col-md-12 mx-auto" >
		<div class="mt-1">
			@if (session('status'))
			<div class="alert alert-success " role="alert">
				{{session('status') }}
			</div>
			@endif
			@if ($errors->any())
			<div class="alert alert-danger " role="alert">
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
				<h1 class="h3 mb-0 text-gray-800 mt-1">List Data Anggota</h1>
			</div>
			<div class="card-body ">
				<div class="d-flex justify-content-end">
					<a href="/create-user"  class="btn btn-info btn-sm mb-2"><i class="bi bi-plus"></i> Register</a>
				</div>
				<table class="table table-striped table-hover table-akuhh">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Anggota</th>
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>Jenis Kelamin</th>
							<th>Status</th>
							<th>Telepon</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($user as $a)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $a->kode_anggota }}</td>
							<td>{{ $a->nama_lengkap }}</td>
							<td>{{ $a->email }}</td>
							<td>{{ $a->jk }}</td>
							<td>{{ $a->status }}</td>
							<td>{{ $a->tlp }}</td>
							<td>
								<button class="btn btn-info btn-sm" > <a href="/detail-user/{{ $a->id }}"><i class="bi bi-clipboard-fill text-white"></i></a></button>
								<button class="btn btn-danger btn-sm">
								<a href="user-delete/{{$a->id}}" onclick="return confirm('Yakin ingin menghapus ?');"> <i class="fa fa-trash text-white"></i></a>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
		</div>
		
	</div>
</div>
@endsection