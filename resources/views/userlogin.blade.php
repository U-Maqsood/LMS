<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Retention Portal - Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('')}}/public/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{URL::to('')}}/public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('')}}/public/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card card-outline card-primary ">
    <div class="card-body login-card-body">
    <!-- <p class="text-center"><img src="{{URL::to('')}}/resources/assets/img/logo.png" style="width:150px;"></p> -->
<div class="login-logo">
    <a href="#">Info Portal</a>
  </div>
        <h5 class="text-center mb-3">Manager & Retention Panel</h5>

        {{-- //{{URL::to('/Login')}} --}}
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="username" name="username" class="form-control" placeholder="Username" required>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <input type="hidden" id="userbrowser" name="userbrowser" >
          <input type="hidden" name="userdevice" id="userdevice">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
          <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt mr-2"></i> Sign In</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-lg-12">
        <p class="mb-1 text-sm text-center">
            <br><br>

      </p>
      <br>
      <p>

                @if (Session::has("error"))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif

      </p>


    </div>
      </div>
      <br>
    </div>
    <!-- /.login-card-body -->

  </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{URL::to('')}}/public/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::to('')}}/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{URL::to('')}}/public/assets/dist/js/adminlte.min.js"></script>

</body>
</html>



