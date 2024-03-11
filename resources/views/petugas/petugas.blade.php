@extends('layouts.lay')

@section('title','Petugas')
@section('content')
<div class="row">
	<div class="col-md-8 mx-auto" >
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

			  <h1 class="h3 mb-0 text-gray-800 mt-1">Petugas</h1>
			</div>
			<div class="card-body ">
				<div class="d-flex justify-content-end">
					
					<a href="" data-toggle="modal" data-target="#addRak" class="btn btn-info btn-sm mb-2"><i class="fa fa-plus"></i> Add Petugas</a>
					
				</div>
				<table class="table table-striped table-hover">
				  <thead>
				    <tr>
				      <th>No</th>
				      <th>Nama Petugas</th>
				      <th>Jabatan</th>
				      <th>No Telepon</th>
				      <th>Alamat</th>
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($petugas as $a)
				  	<tr>
				  		<td>{{ $loop->iteration }}</td>
				  		<td>{{ $a->nama }}</td>
				  		<td>{{ $a->jabatan }}</td>
				  		<td>{{ $a->tlp }}</td>
				  		<td>{{ $a->alamat }}</td>
				  		<td>
				  			<button class="btn btn-info btn-sm" > <a href="petugas-edit/{{$a->id}}"> <i class="fa fa-wrench text-white"></i></a></button>
		            <button class="btn btn-danger btn-sm">
		            	<a href="petugas-delete/{{$a->id}}" onclick="return confirm('Yakin ingin menghapus ?');"> <i class="fa fa-trash text-white"></i></a>
		            </button>
				  		</td>
				  	</tr>
				  	@endforeach
				  </tbody>
				 </table>
				
			</div>
		</div>
		
	</div>

<!-- Modal Tambah  -->
	<div id="addRak" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<div class="card">
							<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
								<h1 class="h3 mb-0 text-gray-800 mt-1">Tambah Petugas</h1>
							</div>
							<div class="card-body">
								<!-- alert validate error karena nama sama -->
								@if ($errors->any())
								    <div class="alert alert-danger" role="alert">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
								<form action="petugas-add" method="post">
									@csrf
									<div>
										<label for="nama">Nama<small style="color: red;">* Gunakan Huruf !!</small></label>
										<input type="text" name="nama" class="form-control ">
									</div>
									<div>
										<label for="jabatan">jabatan</label>
										<input type="text" name="jabatan" class="form-control ">
									</div>
									<div>
										<label for="tlp">No Telepon<small style="color: red;">* Gunakan Angka !!</small></label>
										<input type="text" name="tlp" class="form-control ">
									</div><div>
										<label for="alamat">Alamat</label>
										<input type="text" name="alamat" class="form-control ">
									</div>
									<div class="mt-3">
										<button class="btn btn-success" type="submit">Save</button>
									</div>
								</form>
								
							</div>
					</div>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection