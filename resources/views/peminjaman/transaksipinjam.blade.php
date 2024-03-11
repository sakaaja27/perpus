@extends('layouts.lay')

@section('title','Peminjam')
@section('content')
<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="mt-1">
        @if (session('message'))
          <div class="alert {{session('alert-class')}} " role="alert">
            {{session('message') }}

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
        <h1 class="h3 mb-0 text-gray-800 mt-1">Tambah Pinjam Buku</h1>
      </div>
      <div class="card-body">
        <form action="pinjambuku" method="post">
          @csrf
          <div class="mb-3"> 
            <label for="nama" class="form-label">Anggota</label>
            <select type="text" name="user_id" class="form-control ">
              <option value="">Pilih Anggota</option>
              @foreach ($user as $a)
              <option value="{{ $a->id }}">{{ $a->kode_anggota }}, Nama : {{$a->nama_lengkap}} </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3"> 
            <label for="petugas" class="form-label">Petugas :</label>
            <select type="text" name="id_petugas" class="form-control ">
              <option value="">Pilih Petugas</option>
              @foreach ($petugas as $a)
              <option value="{{ $a->id }}">{{$a->nama}} </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="buku" class="form-label">Kode Buku</label>
            <select type="text" name="buku_id" class="form-control ">
            <option value="">Pilih Buku</option>
              @foreach ($buku as $a)
            <option value="{{ $a->id }}">{{ $a->buku_kode }}, Judul : {{$a->judul}}</option>
              @endforeach
              </select>
          </div>
          <div class="mb-3">
            <label for="denda" class="form-label">Denda ketika terlambat</label>
              @foreach ($denda as $a)
             <input type="hidden" name="denda_id" class="form-control" value="{{ $a->id }}" readonly>
             <p>{{$a->nama_denda}}</p>
             

              @endforeach
            
          </div>
          <div class="mt-3">
            <button class="btn btn-success" type="submit">Simpan</button>
            <a href="/daftarpinjam" class="btn btn-danger btn-md">Kembali</a>
          </div>
        </form>
        
      </div>
    </div>
  </div>

</div>

@endsection