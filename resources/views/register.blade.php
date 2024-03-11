<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="icon" type="image/png" href="{{asset('image/logoperpus.png') }}">
    <title>Register</title>
  </head>
  <style type="text/css">
  .gradient-custom {
  /* fallback for old browsers */
  background: #f093fb;
  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));
  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
  }
  .card-registration .select-input.form-control[readonly]:not([disabled]) {
  font-size: 1rem;
  line-height: 2.15;
  padding-left: .75em;
  padding-right: .75em;
  }
  .card-registration .select-arrow {
  top: 13px;
  }
  </style>
  <body>
    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
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
                 <form action="register" method="post">
                  @csrf
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="nama_lengkap">Nama Lengkap <small style="color: red;">* Gunakan Huruf !!</small></label>
                      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-lg" />
                      <input type="hidden" name="kode_anggota" value="{{ 'AG-'.$bk }}" id="kode_anggota" readonly  class="form-control form-control-lg"/>
                    </div>
                  </div>

                   <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control form-control-lg" />
                    </div>
                  </div>

                   <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="tlp">Phone Number <small style="color: red;">* Gunakan Angka !!</small></label>
                      <input type="tel" name="tlp" id="tlp" class="form-control form-control-lg" />
                    </div>
                  </div>

                   <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="alamat">Alamat</label>
                      <input type="text" name="alamat" id="alamat" class="form-control form-control-lg" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" aria-label="Default select example">
                          <option selected>Pilih :</option>
                          <option value="Pelajar">Pelajar</option>
                          <option value="Mahasiswa">Mahasiswa</option>
                          <option value="Warga Sipil">Warga Sipil</option>
                          <option value="PNS">PNS</option>
                          <option value="Pegawai Swasta">Pegawai Swasta</option>
                        </select>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <h6 class="mb-2 pb-1">Jenis Kelamin : </h6>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" id="jk"
                        value="Laki-Laki" checked />
                        <label class="form-check-label" for="jk">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" id="jk"
                        value="Perempuan" />
                        <label class="form-check-label" for="jk">Perempuan</label>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <label class="form-label" for="password">Password <small style="color: red;">* Min 8 (Kombinasi Angka & huruf)</small></label>
                      <input type="password" name="password" id="password" class="form-control form-control-lg" />
                    </div>
                  </div>
                   <div class="pull-right">
              <button class="btn btn-primary btn-lg" type="submit">Simpan</button>
              <a href="/login" class="btn btn-danger btn-lg">Kembali</a></a></button>
            </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 ">
                     
                    
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="{{asset('image/dashboard.png') }}"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 10000);
</script>
   
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/jquery-3.5.1.min.js') }}"></script>
  </body>
</html>