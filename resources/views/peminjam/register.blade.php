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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth register-full-bg">
        <div class="row w-100">
        
          <div class="col-lg-7 mx-auto">
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
            <div class="auth-form-light text-left p-5">
              <h2>Daftar Akun</h2>
              <form action="{{ route('register-proses') }}" method="POST" enctype="multipart/form-data" class="pt-4">
              {{ csrf_field() }}
                <form>
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1" class="font-weight-bold">Image</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="img">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword2" class="font-weight-bold">NIP / NIS</label>
                        <input type="number" class="form-control" id="exampleInputPassword2" name="nip_nis">
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="exampleInputPassword2" class="font-weight-bold">Username</label>
                        <input type="text" class="form-control" id="exampleInputPassword2" name="username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword2" class="font-weight-bold">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" name="password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword2" class="font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword2" name="email">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2" class="font-weight-bold">Alamat</label>
                    <textarea class="form-control" rows="5" name="alamat"></textarea>
                  </div>
                  <div class="mt-5">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium">Register</button>
                  </div>
                  <div class="mt-2 text-center">
                    <div  class="auth-link text-black">Already have an account? <span class="font-weight-medium text-black"><a href="{{route('login-user')}}">Login Disini</a></span></div>
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