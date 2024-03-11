@extends('layouts.lay')

@section('title','Rak')
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

			  <h1 class="h3 mb-0 text-gray-800 mt-1">Rak</h1>
			</div>
			<div class="card-body ">
				<div class="d-flex justify-content-end">
					<a class="btn btn-info btn-sm mb-2 me-2" data-toggle="modal" data-target="#myModal">View Delete</a>
					<a href="" data-toggle="modal" data-target="#addRak" class="btn btn-info btn-sm mb-2"><i class="fa fa-plus"></i> Add Rak</a>
					
				</div>
				<table class="table table-striped table-hover table-akuhh">
				  <thead>
				    <tr>
				      <th>No</th>
				      <th>Nama Rak</th>
				      <th>Lokasi</th>
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($rak as $a)
				  	<tr>
				  		<td>{{ $loop->iteration }}</td>
				  		<td>{{ $a->nama_rak }}</td>
				  		<td>{{ $a->lokasi_rak }}</td>
				  		<td>
				  			<button class="btn btn-info btn-sm" > <a href="rak-edit/{{$a->id}}"> <i class="fa fa-wrench text-white"></i></a></button>
		            <button class="btn btn-danger btn-sm">
		            	<a href="rak-delete/{{$a->id}}" onclick="return confirm('Yakin ingin menghapus ?');"> <i class="fa fa-trash text-white"></i></a>
		            </button>
				  		</td>
				  	</tr>
				  	@endforeach
				  </tbody>
				 </table>
				
			</div>
		</div>
		
	</div>
	<div id="myModal" class="modal fade" role="dialog">
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

			  <h1 class="h3 mb-0 text-gray-800 mt-1">rak</h1>
			</div>
			<div class="card-body ">
				<table class="table table-striped table-hover">
				  <thead>
				    <tr>
				      <th>No</th>
				      <th>Nama</th>
				      <th>Lokasi</th>
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($viewdel as $b)
				  	<tr>
				  		<td>{{ $loop->iteration }}</td>
				  		<td>{{ $b->nama_rak }}</td>
				  		<td>{{ $b->lokasi_rak }}</td>
				  		<td>
				  		 <a  class="btn btn-info btn-sm text-white" href="rak-restore/{{$b->id}}"> Restore</a>
				  		</td>
				  	</tr>
				  	@endforeach
				  </tbody>
				 </table>
				
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
								<h1 class="h3 mb-0 text-gray-800 mt-1">Tambah Rak</h1>
							</div>
							<div class="card-body">
								<!-- alert validate error karena nama sama -->
								@if ($errors->any())
								    <div class="alert alert-danger ">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
								<form action="rak-add" method="post">
									@csrf
									<div>
										<label for="nama_rak">Nama Rak</label>
										<input type="text" name="nama_rak" class="form-control ">
									</div>
									<div>
										<label for="lokasi_rak">Lokasi</label>
										<input type="text" name="lokasi_rak" class="form-control ">
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