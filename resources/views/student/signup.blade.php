<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::to('storage/app').'/'.$global_settings->site_logo }}">
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
                <h5 class="text-center mb-3">Signup on <span class="text-primary">{{ $global_settings->site_name }}</span></h5>

                <form action="" method="post">

                    <div class="card-body">

                        <x-validation_errors />

                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="Confirm Password">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
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
