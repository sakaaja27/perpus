@extends('layouts.lay')

@section('title','Rak Edit')
@section('content')
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
				<h1 class="h3 mb-0 text-gray-800 mt-1">Edit Rak</h1>
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
				<form action="/rak-edit/{{ $rak->id }}" method="post">
					@csrf
					<div>
						<label for="nama_rak">Nama</label>
						<input type="text" name="nama_rak" class="form-control " value="{{ $rak->nama_rak }}">
					</div>
					<div>
						<label for="lokasi_rak">Lokasi</label>
						<input type="text" name="lokasi_rak" class="form-control " value="{{ $rak->lokasi_rak }}">
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