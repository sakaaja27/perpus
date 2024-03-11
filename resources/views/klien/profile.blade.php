@extends('layouts.lay')
@section('title','Profile')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit Profil Saya</h3>
        </div>
        <!-- /.box-header -->
        <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="box-body">
            
            <div class="form-group">
              <label>Kode Anggota</label>
              <input type="text" class="form-control" value="{{ $user->kode_anggota }}" name="kode_anggota" required="required">
            </div>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_lengkap" value="{{ $user->nama_lengkap }}" required="required">
            </div>
           
            <div class="form-group">
              <label class="small mb-1" for="jk">Jenis Kelamin</label>
              <br/>
              <input type="radio" name="jk" <?php if($user->jk == 'Laki-Laki'){ echo 'checked';}?> value="Laki-Laki" required="required"> Laki-Laki
              <br/>
              <input type="radio" name="jk" <?php if($user->jk == 'Perempuan'){ echo 'checked';}?> value="Perempuan" required="required"> Perempuan
              
              
            </div>
            <div class="form-group">
              <label>Status : <small style="color: red;"></small></label>
              <select class="form-select" name="status" aria-label="Default select example">
                    <option selected>Pilih :</option>
                    <option  <?php if ($user->status =="Pelajar"){echo "Selected='selected'";}?> value="Pelajar">Pelajar</option>
                    <option  <?php if ($user->status =="Mahasiswa"){echo "Selected='selected'";}?> value="Mahasiswa">Mahasiswa</option>
                    <option  <?php if ($user->status =="Warga Sipil"){echo "Selected='selected'";}?> value="Warga Sipil">Warga Sipil</option>
                    <option  <?php if ($user->status =="PNS"){echo "Selected='selected'";}?> value="PNS">PNS</option>
                    <option  <?php if ($user->status =="Pegawai Swasta"){echo "Selected='selected'";}?> value="Pegawai Swasta">Pegawai Swasta</option>
                    
                  </select>
            </div>
            <div class="form-group">
              <label>Password (opsional)</label>
              <input type="password" class="form-control" name="password" placeholder="Isi Password Jika di Perlukan Ganti">
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input id="uintTextBox" class="form-control" value="{{$user->tlp}}" name="tlp" required="required" >
            </div>
             <div class="form-group">
              <label>Alamat</label>
              <input id="uintTextBox" class="form-control" value="{{$user->alamat}}" name="alamat" required="required" >
            </div>
            <div class="form-group">
              <label>E-mail</label>
              <input type="email"  value="{{ $user->email }}" readonly class="form-control" name="email" required="required" placeholder="Contoh : fauzan1892@codekop.com">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-block btn-primary">Update</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Profil Saya</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body mx-auto">
          
          <!-- -->
          
          <p style="font-weight: bold;">NIK : {{Auth::user()->nis }}</p>
          <p style="font-weight: bold;">Nama Lengkap : {{Auth::user()->nama_lengkap }} </p>
          <p style="font-weight: bold;">Email : {{Auth::user()->email }} </p>
          <p style="font-weight: bold;">Jenis Kelamin : {{Auth::user()->jk }}</p>
          <p style="font-weight: bold;">Status : {{Auth::user()->status }}</p>
          <p style="font-weight: bold;">No.Telepon : {{Auth::user()->tlp }}</p>
          <p style="font-weight: bold;">Alamat : {{Auth::user()->alamat }}</p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.row -->
  </section>
 >
  @endsection