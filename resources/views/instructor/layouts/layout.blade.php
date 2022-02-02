<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("page_title")</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon"  href="{{ URL::to('storage/app').'/'.$global_settings->site_logo }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{URL::to('public')}}/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/plugins/summernote/summernote-bs4.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Tagify -->
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="d-flex align-items-center">
                    <span id="dateTime"></span>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="{{URL::to('/instructor/changepassword')}}" class="dropdown-item">Change My Password</a>
                        <a href="{{URL::to('/instructor/logout')}}" class="dropdown-item">Logout</a>

                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        @include('instructor.layouts.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield("page_name")</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield("breadcrumbs")
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{date('Y')}} <a href="{{URL::to('/')}}">{{ $global_settings->site_name }}</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    {{-- <script src="{{URL::to('/assets')}}/plugins/jquery/jquery.min.js"></script> --}}
    <!-- jQuery UI 1.11.4 -->
    <script src="{{URL::to('public')}}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{URL::to('public')}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{URL::to('public')}}/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{URL::to('public')}}/assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{URL::to('public')}}/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{URL::to('public')}}/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{URL::to('public')}}/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{URL::to('public')}}/assets/plugins/moment/moment.min.js"></script>
    <script src="{{URL::to('public')}}/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{URL::to('public')}}/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="{{URL::to('public')}}/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="{{URL::to('public')}}/assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{URL::to('public')}}/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::to('public')}}/assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{URL::to('public')}}/assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::to('public')}}/assets/dist/js/demo.js"></script>
    <!-- Tagify JS -->
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    
    <style>
        .select2-container--default .select2-selection--multiple {
            height: 40px !important;
        }

    </style>
    <script>
        $(document).ready(function () {

            // Tagify
            new Tagify($("input[name~='tags']")[0],{
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
            });

            // Data Table
            $('#myTable').DataTable({
                "responsive": true,
                "autoWidth": false,
                "order": [0, 'desc']
            });

            // Summernote
            $('#summernote').summernote();

            // Ekko Lightbox for Gallery
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            setInterval(function () {

                $.ajax({

                    url: "{{url('instructor/checkActiveSession')}}",
                    method: "get",
                    success: function (response) {
                        data = parseInt(response);
                        
                        if (data == 0) {

                            window.location.href = "{{url('instructor/logout')}}";

                        }

                    }

                });

            }, 3000);

            // Date Time
            setInterval(function () {

                $.ajax({
                    url: "{{ url('/getDateTime') }}",
                    method: 'get',
                    success: function (response) {
                        document.getElementById("dateTime").innerHTML = response;
                    }
                })

            }, 1000);

            // Pricing
            if($('#discount').is(':checked')){
            $('#discount_field').show();
            }else {
                $('#discount_field').hide();
            }

            // $('#submit_btn').click(function(e){
            //     e.preventDefault();
            //     $('#price').formatCurrency();
            //     $('#discounted_price').formatCurrency();
            //     $('$form').submit();
            // })

            $('#discount').change(function(){
                if($(this).is(':checked')){
                    console.log('checked');
                    $('#discount_field').show();
                }else {
                    $('#discount_field').hide();
                }
                
            })

        });

    </script>

</body>

</html>