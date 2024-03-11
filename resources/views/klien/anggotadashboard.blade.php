
@extends('layouts.lay')

@section('title','dashboard')
@section('content')
<div class="mb-3">
  <div class="mt-1">
    @if (session('message'))
          <div class="alert {{session('alert-class')}} ">
            {{session('message') }}

          </div>
        @endif
    @if (session('status'))
    <div class="alert alert-success ">
      {{session('status') }}
      
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger ">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>
<div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db; padding: 10px;">
            Selamat Datang, {{Auth::user()->nama_lengkap }} di Sistem Informasi Perpustakaan
</div>
  <div class="col-xl-3 col-md-6 mb-4 mx-auto">
    <img src="{{asset('image/logoperpus.png') }}" width="400px" height="400px" style="display: block; margin-left: auto; margin-right: auto; margin-top: 30px; margin-bottom: -20px;">
  </div>
  
</div>
<div class="d-flex justify-content-center">
  @foreach ($user as $a)
  <button class="btn btn-success"> <a href="/profile/{{ $a->id }}" class="text-white">Show Profile</a> </button>
  @endforeach
</div>
 
@endsection