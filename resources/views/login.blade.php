<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
  <link rel="icon" type="image/png" href="{{asset('image/logoperpus.png') }}">
	<title>LOGIN</title>
</head>

<style>
	.divider:after,
	.divider:before {
	content: "";
	flex: 1;
	height: 1px;
	background: #eee;
	}
	.h-custom {
	height: calc(100% - 73px);
	}
	@media (max-width: 450px) {
	.h-custom {
	height: 100%;
	}
	}
</style>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col-md-9 col-lg-6 col-xl-5 ">
        <img src="{{asset('image/logoperpus.png') }}" width="80%">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      	@if (session('status'))
      	<div class="alert alert-danger" role="alert">

      		{{session('message') }}
      	</div>
      	@endif
        <h2>Sistem Informasi Perpustakaan </h2>
        <br>
        <h4>Silahkan login</h4>
        <form action="login" method="post">
          @csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control form-control-lg"
              placeholder="Masukkan email" required />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control form-control-lg"
              placeholder="Masukkan password" required />
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg btn-sm"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
               <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register"
                class="link-danger">Register</a></p>
                 <!-- <p class="small fw-bold mt-2 pt-1 mb-0"><a href="register"
                class="link-danger">Forgot Password</a></p> -->
                
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>

<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
	<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/jquery-3.5.1.min.js') }}"></script>
</body>
</html>