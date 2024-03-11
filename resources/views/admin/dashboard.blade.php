@extends('layouts.lay')

@section('title','Dashboard')
@section('content')
<div class="mb-3">
  
<div class="" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db; padding:10px;">
            Selamat Datang, {{Auth::user()->nama_lengkap }} di Administrator Sistem Informasi Perpustakaan
</div>
  
  
</div>



<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="row">
	 <div class="col-xl-3 col-md-6 mb-4 mx-auto">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Buku</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$buku}}</div>
              </div>
              <div class="col-auto">

                <i class="bi bi-book-fill fa-2x text-gray-300"></i>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4 mx-auto">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Daftar Anggota</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-people-fill fa-2x text-gray-300"></i>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 mx-auto">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Buku dipinjam</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pinjam}}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-collection-fill fa-2x text-gray-300"></i>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 mx-auto">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Buku Dikembalikan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kembali}}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-collection-fill fa-2x text-gray-300"></i>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>



@endsection