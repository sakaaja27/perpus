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
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header with-border">
						</div>
						<div class="col-md-8 mb-4 mx-auto">
						<h3 class='text-center mt-1' style='font-family: Quicksand, sans-serif; margin-top: -30px;'>.-- Laporan Detail Pengembalian --.</h3>
					</div>

					<div class=" col-md-8 mt-3 mx-auto">
						<p class="text-center">Sistem Informasi Perpustakaan</p>
					</div>
											<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-sm-5">
									<form action="/kembali-detail/{{ $log->id }}" method="POST">
										
									</form>
									<table class="table table-striped">
										<tr style="background:aqua">
											<td colspan="3">Data Transaksi</td>
										</tr>
										
										<tr>
											<td>Tgl Peminjaman</td>
											<td>:</td>
											<td>
												{{$log->waktu_pinjam}}
											</td>
										</tr>
										<tr>
											<td>Tenggat pengembalian</td>
											<td>:</td>
											<td>
												{{$log->waktu_kembali}}
											</td>
										</tr>
										<tr>
											<td>Nama Petugas</td>
											<td>:</td>
											<td>
												{{$log->petugas->nama}}
											</td>
										</tr>
										
										<tr>
											<td>Biodata</td>
											<td>:</td>
											<td>
												
												<table class="table table-striped">
													<tr>
														<td>Kode Anggota</td>
														<td>:</td>
														<td>
															{{$log->user->kode_anggota}}
														</td>
													</tr>
													<tr>
														<td>Nama Anggota</td>
														<td>:</td>
														<td>{{$log->user->nama_lengkap}}</td>
													</tr>
													<tr>
														<td>Telepon</td>
														<td>:</td>
														<td>{{$log->user->tlp}}</td>
													</tr>
													<tr>
														<td>E-mail</td>
														<td>:</td>
														<td>{{$log->user->email}}</td>
													</tr>
													<tr>
														<td>Status</td>
														<td>:</td>
														<td>{{$log->user->status}}</td>
													</tr>
													
													
												</table>
												
											</td>
										</tr>
										
									</table>
								</div>
								<div class="col-sm-7">
									<table class="table table-striped">
										<tr style="background:aqua">
											<td colspan="3">Pinjam Buku</td>
										</tr>
										<tr>
											<td>Stok</td>
											<td>:</td>
											<td>
												{{ $log->actual_waktu_kembali == null ? 'dipinjam' : ($log->waktu_kembali < $log->actual_waktu_kembali ? 'telat mengembalikan' : 'dikembalikan' ) }}
											</td>
										</tr>
										<tr>
											<td>Tgl Kembali</td>
											<td>:</td>
											<td>
												{{ $log->actual_waktu_kembali }}
											</td>
										</tr>
										<tr>
											<td>Denda</td>
											<td>:</td>
											<td>
												{{ $log->actual_waktu_kembali == null ? '0' : ($log->waktu_kembali < $log->actual_waktu_kembali ? $log->denda->nama_denda : '0' ) }}
												
											</td>
										</tr>
										<tr>
											<td>Kode Buku</td>
											<td>:</td>
											<td>
												{{ $log->buku->buku_kode }}
											</td>
										</tr>
										<tr>
											<td>Data Buku</td>
											<td>:</td>
											<td>
												<table class="table table-striped">
													<thead>
														<tr>
															
															<th>judul</th>
															<th>Category</th>
															<th>Rak Buku</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>{{ $log->buku->judul }}</td>
															<td>{{ $log->buku->categoris->nama }}</td>
															<td>{{ $log->buku->rak->nama_rak }}</td>
														</tr>
														
													</tbody>
												</table>
											</td>
										</tr>
									</table>
								</div>
							</div>
							
						</div>
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