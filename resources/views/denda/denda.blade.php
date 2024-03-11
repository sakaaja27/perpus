@extends('layouts.lay')

@section('title','Denda')
@section('content')
<div class="row">
	<div class="col-md-5 mx-auto" >
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

			  <h1 class="h3 mb-0 text-gray-800 mt-1">Denda</h1>
			</div>
			<div class="card-body ">
				<div class="d-flex justify-content-end">				
				</div>
				<table class="table table-striped table-hover">
				  <thead>
				    <tr>
				      <th>Harga Denda</th>
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($denda as $a)
				  	<tr>
				  		<td>Rp. {{ $a->nama_denda }}</td>
				  		<td>
				  				<button class="btn btn-info btn-sm" > <a href="denda-edit/{{$a->id}}"> <i class="fa fa-wrench text-white"></i></a></button>
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
								<h1 class="h3 mb-0 text-gray-800 mt-1">Tambah Rak</h1>
							</div>
							<div class="card-body">
								<!-- alert validate error karena nama sama -->
								@if ($errors->any())
								    <div class="alert alert-danger w-50">
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
										<input type="text" name="nama_rak" class="form-control w-50">
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