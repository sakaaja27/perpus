@extends('layouts.lay')

@section('title','Buku')
@section('content')

<div class="col-md-10 mx-auto" >
      <div class="mt-1">
        @if (session('status'))
          <div class="alert alert-success " role="alert">
            {{session('status') }}
              
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

        <h1 class="h3 mb-0 text-gray-800 mt-1">List Buku</h1>
      </div>
      <div class="card-body ">
        <div class="d-flex justify-content-end">
          <!-- <a class="btn btn-info btn-sm mb-2 me-2" data-toggle="modal" data-target="#myModal">View Delete</a> -->
          <a href="/buku-add" class="btn btn-info btn-sm mb-2"><i class="fa fa-plus"></i> Add Buku</a>
          
        </div>
        <table class="table table-striped table-hover table-akuhh">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Rak Buku</th>
                <th>Stok</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($buku as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->buku_kode}}</td>
                <td>{{$a->judul}}</td>
                <td>
                  {{$a->penerbit}}
                </td>
                <td>
                  {{$a->rak->nama_rak}}
                </td>
                <td>{{$a->stok}}</td>
                <td>
                    <button class="btn btn-info btn-sm" > 
                      <a href="/buku-edit/{{$a->id}}"><i class="fa fa-wrench text-white"></i></a>
                    </button>
                    <button class="btn btn-danger btn-sm">
                      <a href="buku-delete/{{$a->id}}" onclick="return confirm('Yakin ingin menghapus ?');"> <i class="fa fa-trash text-white"></i></a>
                    </button>
                </td>
              </tr>
              @endforeach
            </tbody>
      </table>
      </div>
    </div>
  </div>
@endsection