<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inventaris Sarana dan Prasarana</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('css/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
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
  
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth login-full-bg">
      
        <div class="row w-100">
        
          <div class="col-lg-4 mx-auto">
          @if(session()->has('login-gagal'))
          <div class="row">
            <div class="alert alert-danger col-xl-12 text-center">
              {{ session('login-gagal') }}
            </div>
          </div>
          @endif
          @if(\Session::has('alert'))
          <div class="alert alert-danger col-xl-12 text-center">
					<div>{{Session::get('alert')}}</div>
				</div>
				@endif
        @if(session()->has('success-regist'))
          <div class="row">
            <div class="alert alert-success col-xl-12 text-center">
              {{ session('success-regist') }}
            </div>
          </div>
          @endif
          @if ($errors->any())
                    <div class="row">
                        <div class="col-xl-12">
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                            @endforeach 
                        </div>
                    </div>
                    @endif
            <div class="auth-form-dark text-left p-5">
            <a href="{{route('index') }}"><button class="btn btn-success float-right"><i class="fa fa-home"></i>Home</button></a>  
              <h2>Login</h2>
              <h4 class="font-weight-light">Hello! let's get started</h4>
              <form class="pt-5" action="{{route('login-proses') }}" method="POST">
              {{ csrf_field() }}
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username">
                    <i class="mdi mdi-account"></i>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    <i class="mdi mdi-eye"></i>
                  </div>
                  <div class="mt-5">
                    <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium">Login</button>
                  </div>
                  <div class="mt-3 text-center">
                    <a  class="auth-link text-white">Belum punya akun ?<a href="{{route('register') }}" class="text-white"> Daftar disini !!</a></a>
                  </div>
                </form>                  
              </form>
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
