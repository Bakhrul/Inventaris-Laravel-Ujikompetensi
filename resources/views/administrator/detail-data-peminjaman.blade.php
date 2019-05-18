<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventaris Sarana dan Prasarana</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('css/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons/css/simple-line-icons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png') }}" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" ><img src="{{asset('images/logo_smk.png  ') }}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini"><img src="{{ asset('images/smk.jpg') }}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle dropdown-toggle" src="{{asset('images/'.Session::get('gambar_petugas')) }}" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
              
              <div class="dropdown-divider"></div>
              <a href="{{route('logout-admin') }}" class="dropdown-item preview-item">
                
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Log Out
                </div>
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="{{asset('images/'.Session::get('gambar_petugas')) }}" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name">{{Session::get('nama_petugas')}}</p>
                <p class="designation">Administrator</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{route('admin-dashboard')}}"><img class="menu-icon" src="{{ asset('images/menu_icons/01.png') }}"
                alt="menu icon"><span class="menu-title">Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin-admin')}}"><img class="menu-icon" src="{{asset('images/menu_icons/08.png')}}"
                alt="menu icon"><span class="menu-title">Data Admin</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('admin-operator')}}"><img class="menu-icon" src="{{asset('images/menu_icons/02.png')}}"
                alt="menu icon"><span class="menu-title">Data Operator</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('admin-user')}}"><img class="menu-icon" src="{{ asset('images/menu_icons/03.png') }}"
                alt="menu icon"><span class="menu-title">Data User</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('admin-jenis')}}"><img class="menu-icon" src="{{asset('images/menu_icons/04.png')}}"
                alt="menu icon"><span class="menu-title">Jenis Barang</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('admin-ruang')}}"><img class="menu-icon" src="{{asset('images/menu_icons/07.png')}}"
                alt="menu icon"> <span class="menu-title">Data Ruang</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('admin-inventaris')}}"><img class="menu-icon" src="{{ asset('images/menu_icons/09.png') }}"
                alt="menu icon"> <span class="menu-title">Data Inventaris</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('admin-peminjaman')}}"><img class="menu-icon" src="{{asset('images/menu_icons/05.png')}}"
                alt="menu icon"><span class="menu-title">Data Peminjaman</span></a></li>
        
        </ul>
      </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Detail Peminjam
                                    </h4>
                                    
                                        <div class="row">
                                        
                                            <div class="col-xl-6">
                                                
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Nama Peminjam</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Nama Peminjam" name="nama_peminjam" value="{{$row->nama_peminjam}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Nama yang meminjamkan</label>
                                                    <input type="text" class="form-control" id="exampleInputName1"
                                                        placeholder="Nama Peminjam" name="nama_peminjam" value="{{$row->PegawaiJOIN->nama_pegawai}}" readonly>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="exampleInputEmail3">Jumlah Pinjam</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail3"
                                                        placeholder="Jumlah Pinjam" name="jumlah" value="{{$row1->jumlah_pinjam}}" readonly>
                                                </div>
                                               
                                            </div>
                                            <div class="col-xl-6">
                                            <div class="form-group">
                                                    <label for="exampleInputEmail3">Tanggal pinjam</label>
                                                    <input type="date" class="form-control" id="exampleInputEmail3"
                                                        name="tanggal_pinjam" value="{{$row->tanggal_pinjam}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail3">Tanggal Kembali</label>
                                                    <input type="date" class="form-control" id="exampleInputEmail3"
                                                        name="tanggal_kembali" value="{{$row->tanggal_kembali}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Status Pinjaman</label>
                                                    <input type="text" class="form-control" value="{{$row->status_peminjaman}}" readonly>
                                                </div>
                                                
                                            </div>
                                            </div>
                                            <h4 class="card-title">Detail Barang </h4>
                                            <div class="row">
                                        
                                        <div class="col-xl-6">
                                            
                                            <div class="form-group">
                                                <label for="exampleInputName1">Nama Barang</label>
                                                <input type="text" class="form-control" id="exampleInputName1"
                                                    placeholder="Nama Peminjam" name="nama_peminjam" value="{{$row->nama_barang}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Kondisi Barang</label>
                                                <input type="text" class="form-control" id="exampleInputName1"
                                                    placeholder="Nama Peminjam" name="nama_peminjam" value="{{$row1->InventarisJOIN->kondisi}}" readonly>
                                            </div>
                                           
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail3">Kode Barang</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3"
                                                    name="tanggal_kembali" value="{{$row1->InventarisJOIN->kode_inventaris}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Tanggal Pendaftaran Barang</label>
                                                <input type="date" class="form-control" value="{{$row1->InventarisJOIN->tanggal_register}}" readonly>
                                            </div>
                                            
                                        </div>
                                        </div>
                                    

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="container-fluid clearfix">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                2018 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All
                                rights
                                reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &
                                made
                                with <i class="mdi mdi-heart text-danger"></i></span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="{{asset('js/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{ asset('js/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <script src="{{ asset('js/chart/dist/Chart.min.js') }}"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{asset('js/off-canvas.js') }}"></script>
        <script src="{{asset('js/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('js/dashboard.js') }}"></script>

        <script src="{{ asset('js/maps.js') }}"></script>
        <!-- End custom js for this page-->
</body>

</html>