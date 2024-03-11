<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/bootstrap/DataTables/datatables.min.css') }}">
		<link rel="icon" type="image/png" href="{{asset('image/logoperpus.png') }}">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
		<!-- Custom fonts for this template-->
		<link href="{{ asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">
			<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
			
			<title>PERPUSTAKAAN </title>
		</head>
		<body>
			<div class="col-md-12 mx-auto" >
				<div class="card">
					
					<div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
						<h3 class='text-center mt-1' style='font-family: Quicksand, sans-serif; margin-top: -30px;'>.-- Laporan Pengembalian --.</h3>
					</div>

					<div class=" col-md-8 mt-3 mx-auto">
						<p class="text-center">Perpustakaan SMAN 2 Kota Probolinggo</p>
					</div>
					<div class=" col-md-8 mb-4 mx-auto">
						<p class="text-center">Alamat : Jl. Ki Hadjar Dewantara, 01, Kanigaran, Kec. Kanigaran, Kota Probolinggo, Jawa Timur 67213</p>
					</div>
					<div class="card-body ">
						<table id="table-data" class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Buku</th>
									<th>Kode Anggota</th>
									<th>Nama</th>
									<th>tanggal Peminjam</th>
									<th>Tenggat Kembali</th>
									<th>Tanggal Dikembalikan</th>
									<th>Stok</th>
									<th>Denda</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach ($log as $a)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $a->buku->buku_kode }}</td>
									<td>{{ $a->user->kode_anggota }}</td>
									<td>{{ $a->user->nama_lengkap }}</td>
									<td>{{ $a->waktu_pinjam }}</td>
									<td>{{ $a->waktu_kembali }}</td>
									<td>{{ $a->actual_waktu_kembali }}</td>
									<td >{{ $a->actual_waktu_kembali == null ? 'dipinjam' : ($a->waktu_kembali < $a->actual_waktu_kembali ? 'telat mengembalikan' : 'dikembalikan' ) }}</td>
									<td>{{ $a->actual_waktu_kembali == null ? '0' : ($a->waktu_kembali < $a->actual_waktu_kembali ? $a->denda->nama_denda : '0' ) }}</td>
									
									
								</tr>
								@endforeach
							</tbody>
							
						</table>
					</div>
				</div>
			</div>
			<script>
			$(document).ready(function(){
			$('#tabel-data').DataTable();
			});
			</script>
			<script type="text/javascript">
				window.print();
			</script>
			<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
			<script src="{{ asset('/bootstrap/js/jquery-3.5.1.min.js') }}"></script>
			<script src="{{ asset('/vendor/jquery/jquery.min.js')}}"></script>
			<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
			<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
			<!-- Core plugin JavaScript-->
			<script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
			<!-- Custom scripts for all pages-->
			<script src="{{ asset('/js/sb-admin-2.min.js')}}"></script>
			<!-- datatabel -->
			<script src="{{ asset('/bootstrap/DataTables/datatables.min.js') }}"></script>
			<!-- Page level plugins -->
			<script src="{{ asset('/vendor/chart.js/Chart.min.js')}}"></script>
			<!-- Page level custom scripts -->
			<script src="{{ asset('/js/demo/chart-area-demo.js')}}"></script>
			<script src="{{ asset('/js/demo/chart-pie-demo.js')}}"></script>
			<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
			<script type="text/javascript">
			$(document).ready(function(){
			$(".table-akuhh").DataTable();
			});
			</script>
		</body>
	</html>