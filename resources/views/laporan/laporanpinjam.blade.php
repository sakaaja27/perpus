@extends('layouts.lay')

@section('title','laporan')
@section('content')
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
				<h1 class="h3 mb-0 text-gray-800 mt-1">Laporan Peminjaman dan Pengembalian Buku</h1>
			</div>
			<div class="card-body">
				<div class="input-group mb-3">
					<label class="form-label mr-3">Tanggal Awal :</label>
					<input type="date" name="tglawal" id="tglawal" class="form-control">
				</div>

				<div class="input-group mb-3">
					<label class="form-label mr-3">Tanggal Akhir :</label>
					<input type="date" name="tglakhir" id="tglakhir" class="form-control">
				</div>

				<div class="input-group mb-3">
					<a href="" onclick="this.href='print-pinjam/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary ">Print</a>
				</div>
				
			</div>
		</div>
	</div>

</div>


@endsection