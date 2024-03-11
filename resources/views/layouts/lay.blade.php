<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/bootstrap/DataTables/datatables.min.css') }}">
    <link rel="icon" type="image/png" href="{{asset('image/logoperpus.png') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link
       href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  
	<title>PERPUSTAKAAN | @yield('title')</title>
</head>

<body class="page-top">
<div class="wrapper">  
@includeIf('navbar.navbar')

</div>



<!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="{{ asset('/bootstrap/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin-2.min.js')}}"></script>

    <!-- datatabel -->
    <script src="{{ asset('/bootstrap/DataTables/datatables.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('/js/demo/chart-pie-demo.js')}}"></script>
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 10000);
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".table-akuhh").DataTable();
    });
</script>
</body>
</html>