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

        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth login-full-bg">

                <div class="row w-100">

                    <div class="col-lg-6 mx-auto">
                        <div class="alert alert-primary col-xl-12 text-center" style="letter-spacing:3px;">
                            <marquee direction="left" scrollamount="7" align="center">Apilkasi Inventaris Sarana dan Prasarana, Mohon Gunakan Dengan Bijak</marquee>
                        </div>
                        <div class="auth-form-dark text-left p-5">
                            <h4 class="font-weight-light mb-5 text-center">Selamat Datang, Silahkan login terlebih
                                dahulu sesuai level anda </h4>
                            <div class=" row">
                                <div class="col-xl-12 mb-3">
                                    <a href="{{route('login-admin') }}">
                                        <button class="btn btn-primary col-xl-12 p-3">Halaman Admin&ensp;<i class="fa fa-home"></i></button>
                                    </a>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <a href="{{route('login-user') }}">
                                        <button class="btn btn-success col-xl-12 p-3  strong"> <i class="fa fa-arrow-left"></i>&ensp;Halaman
                                            User</button>
                                    </a>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <a href="{{route('login-operator') }}">
                                        <button class="btn btn-warning p-3 col-xl-12  strong">Halaman Operator&ensp;<i
                                                class="fa fa-arrow-right"></i></button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
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
    <!-- endinject -->
</body>

</html>