@extends('layouts.lay')

@section('title','Peminjam')
@section('content')
<div class="row">
  <div class="col-md-10 mx-auto">
    <div class="mt-1">
        @if (session('message'))
          <div class="alert {{session('alert-class')}} "role="alert">
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
        <h1 class="h3 mb-0 text-gray-800 mt-1">Return Book</h1>
      </div>
      <div class="card-body">
        <form action="/daftarkembali/{{$log->id}}" method="post">
          @csrf
          <div class="mb-3">
              <label for="kode_anggota">Kode Anggota</label>
              <input type="text" name="kode_anggota" class="form-control" value="{{ $log->user->kode_anggota}} " readonly>
          </div>
           <div class="mb-3">
              <label for="anggota">Anggota</label>
              <input type="text" name="anggota" class="form-control" value=" {{ $log->user->nama_lengkap}}" readonly>
          </div>
          <div class="mb-3">
              <label for="buku_kode">Kode Buku</label>
              <input type="text" name="buku_kode" class="form-control" value="{{ $log->buku->buku_kode}}  {{ $log->buku->judul}}" readonly>
              <input type="hidden" name="stok" class="form-control" value="{{ $log->buku->stok}}" readonly>
          </div>
          <!-- <div class="mb-3">
            <label for="actual_waktu_kembali" class="form-label">Tanggal Kembalikan</label>
            <input type="date" name="actual_waktu_kembali" class="form-control" value="">
          </div> -->
          <div class="mt-3">
          	  
              @foreach ($denda as $a)
             <input type="hidden" name="denda_id" class="form-control" value="{{ $a->nama_denda }}" readonly>
              @endforeach
          </div>
          <div class="mt-3">
            <button class="btn btn-success" type="submit">Kembalikan</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>

</div>

@endsection