@extends('layouts.lay')
@section('title','User')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					@if ($errors->any())
					<div class="alert alert-danger w-50" role="alert">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form action="/detail-user/{{ $user->id }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Kode Anggota</label>
									<input type="text" class="form-control" value="{{ $user->kode_anggota }}" name="kode_anggota" readonly>
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="text" class="form-control" name="nama_lengkap" value="{{ $user->nama_lengkap }}" required="required">
								</div>
								<div class="form-group">
									<label class="small mb-1" for="jk">Jenis Kelamin</label>
									<br/>
									<input type="radio" name="jk" <?php if($user->jk == 'Laki-Laki'){ echo 'checked';}?> value="Laki-Laki" required="required"> Laki-Laki
									<br/>
									<input type="radio" name="jk" <?php if($user->jk == 'Perempuan'){ echo 'checked';}?> value="Perempuan" required="required"> Perempuan
									
									
								</div>
								<div class="form-group">
									<label>Status : <small style="color: red;"></small></label>
									<select class="form-select" name="status" aria-label="Default select example">
										<option selected>Pilih :</option>
										<option  <?php if ($user->status =="Pelajar"){echo "Selected='selected'";}?> value="Pelajar">Pelajar</option>
										<option  <?php if ($user->status =="Mahasiswa"){echo "Selected='selected'";}?> value="Mahasiswa">Mahasiswa</option>
										<option  <?php if ($user->status =="Warga Sipil"){echo "Selected='selected'";}?> value="Warga Sipil">Warga Sipil</option>
										<option  <?php if ($user->status =="PNS"){echo "Selected='selected'";}?> value="PNS">PNS</option>
										<option  <?php if ($user->status =="Pegawai Swasta"){echo "Selected='selected'";}?> value="Pegawai Swasta">Pegawai Swasta</option>
										
									</select>
								</div>
								
								<div class="form-group">
									<label>Password (opsional)</label>
									<input type="password" class="form-control" name="password" placeholder="Isi Password Jika di Perlukan Ganti">
								</div>
								
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Telepon</label>
									<input id="uintTextBox" class="form-control" value="{{$user->tlp}}" name="tlp" required="required" >
								</div>
								<div class="form-group">
									<label>E-mail</label>
									<input type="email"  value="{{ $user->email }}" readonly class="form-control" name="email" required="required" placeholder="Contoh : fauzan1892@codekop.com">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input type="textarea"  value="{{ $user->alamat }}"  class="form-control" name="alamat" required="required" placeholder="Contoh : fauzan1892@codekop.com">
								</div>
								
								
							</div>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-primary btn-md">Edit Data</button>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection