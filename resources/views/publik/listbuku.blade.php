@extends('layouts.lay')
@section('title','list buku')
@section('content')
<div class="row mt-3 md-3">
    <form class="form-inline my-2 my-lg-0" action="" method="get">
          <!--   <div class="col-12 col-sm-4 d-flex justify-content-start">
          <select name="category" id="category" class="form-control">
            <option value="">Pilih Category</option>
              @foreach ($categori as $a)
              <option value="{{ $a->id }}">{{ $a->nama }}</option>
              @endforeach
          </select>
      </div> -->

      <input class="form-control mr-sm-2" name="judul" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>

      
    </form>
</div>
<div class="row mt-4">
    @foreach ($buku as $a)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3" >
        <div class="card h-100">
            <a href="/detail/{{$a->id}}"><img src="{{ $a->cover != null ? asset('storage/cover/'.$a->cover) :  asset('image/tidakadacover.jpg') }}" class="card-img-top" ></a>
            
            <div class="card-body">
                <h6 class="card-title">{{ $a->buku_kode }}</h6>
                <p class="card-text text-dark fw-bold">{{ $a->judul }}</p>
                <p class="card-text text-dark fw-bold">{{ $a->categoris->nama }}</p>
                <!-- jika stok ada maka tampilkan text success else tampilkan text danger -->
                <p class="card-text text-end fw-bold ">Stok Buku : {{ $a->stok }}</p>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection