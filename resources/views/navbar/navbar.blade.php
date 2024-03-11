<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="bi bi-book-half"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Perpustakaan</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        @if(Auth::user())
        @if(Auth::user()->role_id == 1)
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Divider -->
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataanggota"
                        aria-expanded="true" aria-controls="dataanggota">
                        <i class="bi bi-people-fill"></i>
                        <span>Data</span>
                    </a>
                    <div id="dataanggota" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item" href="/user">Anggota</a>
                            <a class="collapse-item" href="/petugas">Petugas</a>
                            
                            
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="bi bi-journals"></i>
                        <span>Katalog Buku</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item" href="/buku">Buku</a>
                            <a class="collapse-item" href="/category">Kategori</a>
                            <a class="collapse-item" href="/rak">Rak</a>
                            <a class="collapse-item" href="/">List Buku</a>

                            
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#huh"
                        aria-expanded="true" aria-controls="huh">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="huh" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="/daftarpinjam">Pinjam Buku</a>
                            <a class="collapse-item" href="/daftarkembali">Pengembalian Buku</a>
                            
                        </div>
                    </div>
                </li>

                
               <li class="nav-item ">
                    <a class="nav-link" href="/laporanpinjam">
                        <i class="bi bi-archive-fill"></i>
                        <span>Laporan</span></a>
                    </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                
                <li class="nav-item ">
                    <a class="nav-link" href="/denda">
                        <i class="bi bi-cash-coin"></i>
                        <span>Denda</span></a>
                    </li>
                    
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/anggotadashboard">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                        </li>
                   <!--  <li class="nav-item active">
                        <a class="nav-link" href="/profile">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Profile</span></a>
                        </li> -->
                        <li class="nav-item active">
                            <a class="nav-link" href="/history">
                                <i class="bi bi-archive-fill"></i>
                                <span>Laporan Buku</span></a>
                            </li>
                            
                            <li class="nav-item active">
                                <a class="nav-link" href="/">
                                    <i class="bi bi-journals"></i>
                                    <span>List Buku</span></a>
                                </li>
                                
                                
                                
                                @endif
                                
                                
                                <!-- Divider -->
                                <hr class="sidebar-divider d-none d-md-block">
                                <!-- Sidebar Toggler (Sidebar) -->
                                <div class="text-center d-none d-md-inline">
                                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                </div>
                            </ul>
                            <!-- End of Sidebar -->
                            <!-- Content Wrapper -->
                            <div id="content-wrapper" class="d-flex flex-column">
                                <!-- Main Content -->
                                <div id="content">
                                    <!-- Topbar -->
                                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                                        <!-- Sidebar Toggle (Topbar) -->
                                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                        <i class="fa fa-bars"></i>
                                        </button>
                                        <!-- Topbar Search -->
                                        <h4 style="font-family: 'Quicksand', sans-serif; font-weight: bold; color:black;">
                                        <small>
                                        <script type='text/javascript'>
                                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                                        var date = new Date();
                                        var day = date.getDate();
                                        var month = date.getMonth();
                                        var thisDay = date.getDay(),
                                        thisDay = myDays[thisDay];
                                        var yy = date.getYear();
                                        var year = (yy < 1000) ? yy + 1900 : yy;
                                        document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                        //
                                        </script>
                                        </small>
                                        </h4>
                                        
                                        <!-- Topbar Navbar -->
                                        
                                        <ul class="navbar-nav ml-auto">
                                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                            <li class="nav-item dropdown no-arrow d-sm-none">
                                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-search fa-fw"></i>
                                                </a>
                                                <!-- Dropdown - Messages -->
                                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                                    aria-labelledby="searchDropdown">
                                                    <form class="form-inline mr-auto w-100 navbar-search">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control bg-light border-0 small"
                                                            placeholder="Search for..." aria-label="Search"
                                                            aria-describedby="basic-addon2">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" type="button">
                                                                <i class="fas fa-search fa-sm"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                            <div class="topbar-divider d-none d-sm-block"></div>
                                            <!-- Nav Item - User Information -->
                                            <li class="nav-item dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->nama_lengkap }}</span>
                                                    <img class="img-profile rounded-circle"
                                                    src="{{asset('image/images.png') }}">
                                                </a>
                                                <!-- Dropdown - User Information -->
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                    aria-labelledby="userDropdown">
                                                    
                                                    <form action="/logout" method="POST">
                                                        @csrf
                                                        <a class="dropdown-item" type="submit" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Logout
                                                        </a>
                                                    </form>
                                                </div>
                                            </li>
                                            @else
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/login">
                                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                                    <span>Login</span></a>
                                                </li>
                                                @endif
                                            </ul>
                                        </nav>
                                        <!-- End of Topbar -->
                                        <div class="container-fluid">
                                            @yield('content')
                                        </div>
                                        <!-- Begin Page Content -->
                                        
                                        <!-- /.container-fluid -->
                                    </div>
                                    <!-- End of Main Content -->
                                    <!-- Footer -->
                                    
                                    <!-- End of Footer -->
                                </div>
                                <!-- End of Content Wrapper -->
                            </div>
                            <!-- End of Page Wrapper -->
                            <!-- Scroll to Top Button-->
                            <a class="scroll-to-top rounded" href="#page-top">
                                <i class="fas fa-angle-up"></i>
                            </a>
                            <!-- Logout Modal-->
                            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Silahkan pilih Logout untuk keluar dari halaman website</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>