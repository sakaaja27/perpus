@extends('layouts.lay')
@section('title','Detail')
@section('content')
<div class="row">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800 mt-1">Detail Buku</h1>
      </div>
      <div class="card-body">
        <!-- alert validate error karena nama sama -->
        @if ($errors->any())
        <div class="alert alert-danger " role="alert">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="/detail/{{$buku->id}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="buku_kode">Kode Buku</label>
            <input type="text" name="buku_kode" readonly class="form-control" value="{{ $buku->buku_kode}}">
          </div>
          <div class="mb-3">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" readonly class="form-control" value="{{$buku->judul}}">
            
          </div>
          
          
          <div class="mb-3">
            <label for="image" class="form-label" style="display: block;">Foto Cover</label>
            @if ($buku->cover!=='')
            <img src="{{asset('storage/cover/'.$buku->cover)}}" alt="" width="300px">
            @else
            <img src="{{asset('image/tidakadacover.jpg') }}" alt="" width="300px">
            @endif
          </div>
          <div class="mb-3">
            <label for="penerbit">penerbit Buku</label>
            <input type="text" readonly name="penerbit" class="form-control" value="{{$buku->penerbit}}">
            
          </div>
          <div class="mb-3">
            <label for="pengarang">pengarang Buku</label>
            <input type="text" name="pengarang" readonly class="form-control" value="{{$buku->pengarang}}">
            
          </div>
          <div class="mb-3">
            <label for="tahun">tahun Buku</label>
            <input type="text" name="tahun" readonly class="form-control" value="{{$buku->tahun}}">
            
          </div>
           <div class="mb-3">
            <label for="stok">Stok Buku</label>
            <input type="text" name="stok" readonly class="form-control" value="{{$buku->stok}}">
            
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="id_category"  id="category"  class="form-control" disabled>
              @foreach ($categori as $b)
              <option  <?php if($buku['id_category']==$b['id']){echo "Selected='selected'";} ?> value="{{ $b->id}}">{{ $b->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="nama_rak" class="form-label">Rak Buku</label>
            <select name="id_rak" id="nama_rak" class="form-control" disabled>
              @foreach ($nama_rak as $c)
              <option  <?php if($buku['id_rak']==$c['id']){echo "Selected='selected'";} ?> value="{{ $c->id}}">{{ $c->nama_rak}} {{ $c->lokasi_rak}}</option>
              @endforeach
            </select>
          </div>
          <div class="mt-3">
            <button class="btn btn-success" type=""><a href="/" class="text-white">Kembali</a></button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
@endsection