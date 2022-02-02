<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Portal - Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="icon"  href="{{ URL::to('storage/app').'/'.$global_settings->site_logo }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">
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
    {{-- <a href="#">Info Portal</a> --}}
  </div>
        <h5 class="text-center mb-3">Admin Panel</h5>

        <x-greetings/>
        
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Username<span class="text-danger">*</span></label>
              <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password<span class="text-danger">*</span></label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      {{-- <form>
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
      </form> --}}

  </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/assets/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
