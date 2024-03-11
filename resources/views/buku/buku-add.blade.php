@extends('layouts.lay')
@section('title','Buku Add')
@section('content')
<div class="row">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800 mt-1">Tambah Buku</h1>
      </div>
      <div class="card-body">
        <!-- alert validate error karena nama sama -->
        
        <form action="buku-add" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="buku_kode">Kode Buku</label>
            <input type="text" name="buku_kode" value="{{ 'BK-'.$bk }}" readonly class="form-control ">
          </div>
          <div class="mb-3">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" class="form-control ">
            
          </div>
          <div class="mb-3">
            <label for="image">Foto Cover</label>
            <input type="file" name="image" class="form-control ">
          </div>
          <div class="mb-3">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" class="form-control">
            
          </div>
          <div class="mb-3">
            <label for="penerbit">penerbit Buku</label>
            <input type="text" name="penerbit" class="form-control">
            
          </div>
          <div class="mb-3">
            <label for="tahun">tahun Buku</label>
            <input type="number" id="tahun" name="tahun" min="1000" max="2399" class="form-control">
            
          </div>
          <div class="mb-3">
            <label for="stok">Stok Buku</label>
            <input type="text" name="stok" class="form-control">
            
          </div>
          
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="id_category" id="category"  class="form-control" >
              <option value="">Pilih Category</option>
              @foreach ($categori as $a)
              <option value="{{ $a->id }}">{{ $a->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="nama_rak" class="form-label">Rak Buku</label>
            <select name="id_rak" id="nama_rak" class="form-control">
              <option value="">Pilih Rak</option>
              @foreach ($nama_rak as $a)
              <option value="{{ $a->id }}">{{ $a->nama_rak}} {{$a->keterangan}}</option>
              @endforeach
            </select>
          </div>
          <div class="mt-3">
            <button class="btn btn-success" type="submit">Save</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
@endsection