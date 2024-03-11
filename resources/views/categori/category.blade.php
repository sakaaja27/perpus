@extends('layouts.lay')

@section('title','Category')
@section('content')
<div class="row">
	<div class="col-md-8 mx-auto" >
			<div class="mt-1">
				@if (session('status'))
	      	<div class="alert alert-success " role="alert">
	      		{{session('status') }}
	      	</div>
      	@endif
			</div>
		<div class="card">
				
			<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">

			  <h1 class="h3 mb-0 text-gray-800 mt-1">Category</h1>
			</div>
			<div class="card-body ">
				<div class="d-flex justify-content-end">
					<a class="btn btn-info btn-sm mb-2 me-2" data-toggle="modal" data-target="#myModal">View Delete</a>
					<a href="category-add" class="btn btn-info btn-sm mb-2"><i class="fa fa-plus"></i> Add Category</a>
					
				</div>
				<table class="table table-striped table-hover">
				  <thead>
				    <tr>
				      <th>No</th>
				      <th>Nama</th>
				      
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($categori as $a)
				  	<tr>
				  		<td>{{ $loop->iteration }}</td>
				  		<td>{{ $a->nama }}</td>
				  		<td>
				  			<button class="btn btn-info btn-sm"> <a href="category-edit/{{$a->id}}"> <i class="fa fa-wrench text-white"></i></a></button>
		            <button class="btn btn-danger btn-sm"> <a href="category-delete/{{$a->id}}" onclick="return confirm('Yakin ingin menghapus ?');"> <i class="fa fa-trash text-white"></i></a></button>
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

			  <h1 class="h3 mb-0 text-gray-800 mt-1">Category</h1>
			</div>
			<div class="card-body ">
				<table class="table table-striped table-hover">
				  <thead>
				    <tr>
				      <th>No</th>
				      <th>Nama</th>
				      
				      <th>Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($viewdel as $b)
				  	<tr>
				  		<td>{{ $loop->iteration }}</td>
				  		<td>{{ $b->nama }}</td>
				  		<td>
				  		 <a  class="btn btn-info btn-sm text-white" href="category-restore/{{$b->id}}"> Restore</a>

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
</div>



@endsection