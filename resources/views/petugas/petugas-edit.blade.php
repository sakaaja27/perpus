@extends('layouts.lay')

@section('title','Petugas Edit')
@section('content')
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
				<h1 class="h3 mb-0 text-gray-800 mt-1">Edit Petugas</h1>
			</div>
			<div class="card-body">
				<!-- alert validate error karena nama sama -->
				@if ($errors->any())
				    <div class="alert alert-danger " role="alert">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				<form action="/petugas-edit/{{ $petugas->id }}" method="post">
					@csrf
					<div>
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control" value="{{ $petugas->nama }}">
					</div>
					<div>
						<label for="jabatan">jabatan</label>
						<input type="text" name="jabatan" class="form-control" value="{{ $petugas->jabatan }}">
					</div>
					<div>
						<label for="tlp">tlp</label>
						<input type="text" name="tlp" class="form-control" value="{{ $petugas->tlp }}">
					</div>
					<div>
						<label for="alamat">alamat</label>
						<input type="text" name="alamat" class="form-control" value="{{ $petugas->alamat }}">
					</div>
					<div class="mt-3">
						<button class="btn btn-success" type="submit">Update</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>

</div>

@endsection