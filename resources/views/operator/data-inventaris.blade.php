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
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/buttons.dataTables.min.css')}}">
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
              <img class="img-xs rounded-circle dropdown-toggle" src="{{asset('images/'.Session::get('gambar_pegawai')) }}" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
              
              <div class="dropdown-divider"></div>
              <a href="{{route('logout-operator') }}" class="dropdown-item preview-item">
                
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Logout
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
              <div class="profile-image"> <img src="{{asset('images/'.Session::get('gambar_pegawai')) }}" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name">{{Session::get('nama_pegawai')}}</p>
                <p class="designation">Operator</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{route('operator-dashboard') }}"><img class="menu-icon" src="{{ asset('images/menu_icons/01.png') }}" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('operator-inventaris') }}"><img class="menu-icon" src="{{ asset('images/menu_icons/09.png') }}" alt="menu icon"> <span class="menu-title">Data Inventaris</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('operator-peminjaman')}}"><img class="menu-icon" src="{{asset('images/menu_icons/05.png')}}" alt="menu icon"><span class="menu-title">Data Peminjaman</span></a></li>
        
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        @if(session()->has('success-add'))
          <div class="row">
            <div class="alert alert-success col-xl-12 text-center">
              {{ session('success-add') }}
            </div>
          </div>
          @endif
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Inventaris
                  </h4>
                  <table class="table table-striped  dt-responsive nowrap mt-2" id="myTable">
                    <thead>
                      <tr>
                      <th>
                      Image
                      </th>
                        <th>
                          Nama Barang
                        </th>
                        <th>
                          Jumlah
                        </th>
                        <th>
                          Jenis Barang
                        </th>
                        <th>
                          Ruang
                        </th>
                        <th>
                          Pinjam
                        </th>
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($inventaris as $data)
                      <tr>
                      <td>
                      <img src="{{ asset('/images/' .$data->image) }}" style=" width:150px;height:100px;" alt="image" >
                      </td>
                        <td>
                          {{$data->nama}}
                        </td>
                        <td>
                          {{$data->jumlah}}
                        </td>
                        <td>
                          {{$data->JenisJOIN->nama_jenis}}
                        </td>
                        <td>
                          {{$data->RuangJOIN->nama_ruang}}
                        </td>
                        <td>
                        <?php
                        if($data->jumlah == 0){
                          ?>
                          <a href="{{ route('operator-tambah-pinjam', $data->id_inventaris) }}"><button class="btn btn-info btn-rounded text-white" disabled>Pinjam</button></a>
                          <?php
                        }else{
                          ?>
                          <a href="{{ route('operator-tambah-pinjam', $data->id_inventaris) }}"><button class="btn btn-info btn-rounded text-white">Pinjam</button></a>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                          <div class="btn-group dropdown">
                            <button type="button" class="btn btn-teal dropdown-toggle text-white btn-sm" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              Manage
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('operator-inventaris-detail', $data->id_inventaris)}}"><i
                                  class="fa fa-reply fa-fw"></i>Show Detail</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="http://www.bootstrapdash.com/"
                target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
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
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('js/jszip.min.js')}}"></script>
  <script src="{{asset('js/pdfmake.min.js')}}"></script>
  <script src="{{asset('js/vfs_fonts.js')}}"></script>
  <script src="{{asset('js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('js/buttons.print.min.js')}}"></script>
  <script src="{{asset('js/buttons.colVis.min.js') }}"></script>
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
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable({
        paging: true,
        sort: false,
      });
    });
  </script>