@extends('layouts.lay')
@section('title',' Add')
@section('content')
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
				<h1 class="h3 mb-0 text-gray-800 mt-1">Tambah User</h1>
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
				<form action="create-user" method="post">
					@csrf
					<div>

						<label for="kode_anggota">Kode Anggota :</label>
						<input type="text" name="kode_anggota" value="{{ 'AG-'.$bk }}" readonly class="form-control">
					</div>
					<div>
						<label for="text">Nama Lengkap<small style="color: red;">* Gunakan Huruf !!</small></label>
						<input type="nama_lengkap" name="nama_lengkap" class="form-control">
					</div>
					<div>
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div>
						<label for="status" class="form-label">Status :</label>
						<select class="form-select" name="status" aria-label="Default select example">
							<option selected>Pilih :</option>
							<option value="Pelajar">Pelajar</option>
							<option value="Mahasiswa">Mahasiswa</option>
							<option value="Warga Sipil">Warga Sipil</option>
							<option value="PNS">PNS</option>
							<option value="Pegawai Swasta">Pegawai Swasta</option>
							
						</select>
					</div>
					<div>
						<h6 class="mb-2 pb-1">Jenis Kelamin : </h6>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="jk" id="jk"
							value="Laki-Laki" checked />
							<label class="form-check-label" for="jk">Laki-Laki</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="jk" id="jk"
							value="Perempuan" />
							<label class="form-check-label" for="jk">Perempuan</label>
						</div>
					</div>
					
					<div>
						<label class="form-label" for="tlp">Phone Number<small style="color: red;">* Gunakan Angka !!</small></label>
						<input type="tel" name="tlp" id="tlp" class="form-control form-control-lg" />
					</div>
					<div>
						<label class="form-label" for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control form-control-lg" />
					</div>
					<div>
						<label class="form-label" for="password">Password<small style="color: red;">* Min 8 (Kombinasi Angka & huruf)</small></label>
						<input type="password" name="password" id="password" class="form-control form-control-lg" />
					</div>
					<div class="mt-3">
						<button class="btn btn-success" type="submit">Save</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</div>
@endsection