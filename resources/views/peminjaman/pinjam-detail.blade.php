@extends('layouts.lay')
@section('title','Peminjaman')
@section('content')
<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="d-flex justify-content-end">
				
				
			</div>
			    <!-- /.box-header -->
			    <div class="box-body">
						<div class="row">
							<div class="col-sm-5">
								<form action="" method="">
									
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
										<td>Kode Anggota</td>
										<td>:</td>
										<td>
											{{$log->user->kode_anggota}}
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
																<td>Nama Anggota</td>
																<td>:</td>
																<td>{{$log->user->nama_lengkap}}</td>
															</tr>
															<tr>
																<td>Status</td>
																<td>:</td>
																<td>{{$log->user->status}}</td>
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
										<td>Status</td>
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
                        <div class="pull-right">
							<a href="/daftarpinjam" class="btn btn-danger btn-sm">Kembali</a>
							<button class="btn btn-info btn-sm" > <a href="/daftarkembali/{{$log->id}}" class="text-white">Kembalikan Buku</a></button>
						</div>
		        </div>
	        </div>
	    </div>
    </div>

@endsection