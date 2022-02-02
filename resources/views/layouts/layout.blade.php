<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon"  href="{{ URL::to('storage/app').'/'.$global_settings->site_logo }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::to('public')}}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- owl carousel 2 -->
    <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}">
    <!-- Default owl Theme -->
    <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Title -->
    <title>@yield('page_title')</title>
    <!-- Custom Style Sheet -->
    @yield('stylesheet')
    <style>

        .nav {
            z-index: 99999;
        }

        .animate__animated {
            opacity: 0;
        }

        .opacity-1 {
            opacity: 1 !important;
        }

        .card{
            max-width: 700px;
        }
        
        .pre-loader-outer{
            background-color:white;
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10000;
        }

        .pre-loader{
            background: url("{{ URL::to('storage/app').'/'.$global_settings->site_logo }}") no-repeat center;
            background-size: 100px;
            animation: animateLogo 0.5s infinite alternate;
            z-index: 100000;
            width: 100%;
            height: 100vh;
        }
        
        @keyframes animateLogo {
        
            0% {
                transform: scale(0.3);
            }
            100% {
                transform: scale(0.7);
            }


        }


    </style>
</head>
<body>

    <!-- Pre-Loader -->
    <div class="pre-loader-outer">
        <div class="pre-loader"></div>
    </div>

    <div class="main-content d-none">
        <x-header/>

        @yield('content')
    
        <x-footer/>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- owl carousel 2 -->
    <script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function(){
            
            // Pre Loader
            // setTimeout(function(){
            //     $('.pre-loader-outer').addClass('d-none');
            // }, 3000);
            $('.main-content').removeClass('d-none');
            $('.pre-loader-outer').addClass('d-none');

            // Owl Carousel 2
            $(".owl-carousel").owlCarousel({
                autoplay: true,
                loop: true,
                nav : true,
                // slideSpeed : 1,
                // paginationSpeed : 1,
                singleItem:true,
                autoHeight: true,
                // margin: 25,
                autowidth: true,
                center: true,
                // stagePadding: 50,
                dots: false,
                navText:["<div><i class='fas fa-less-than carousel-icons'></i></div>","<div><i class='fas fa-greater-than carousel-icons'></i></div>"],
                responsive: {
                    0: {
                        items: 1,
                        margin: 5,
                    },
                    300: {
                        items: 2,
                        stagePadding: 5,
                        margin: 10,
                    },
                    600: {
                        items: 3,
                        stagePadding: 30,
                        margin: 15,
                    },
                    800: {
                        items: 4,
                        stagePadding: 40,
                        margin: 20,
                    },
                    1050: {
                        items: 5,
                        stagePadding: 50,
                        margin: 25,
                    }
                }
            });

            //window and animation items
            var animation_elements = $.find('.animate__animated');
            var web_window = $(window);
            var time = 0;

            //check to see if any animation containers are currently in view
            function check_if_in_view() {

                if(time > 0) {
                    time = 0;
                }

                //get current window information
                var window_height = web_window.height();
                var window_top_position = web_window.scrollTop();

                var window_bottom_position = (window_top_position + window_height);

                //iterate through elements to see if its in view
                $.each(animation_elements, function() {

                    //get the element sinformation
                    var element = $(this);

                    if(element.attr('data-animated') == 'false'){

                        var element_height = $(element).outerHeight();
                        console.log(element_height);
                        var element_top_position = $(element).offset().top;
                        var element_bottom_position = (element_top_position + element_height);
                        var animation_name = element.attr('data-animate')

                        //check to see if this current container is visible (its viewable if it exists between the viewable space of the viewport)
                        if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                            element.addClass('opacity-1' + ' ' + animation_name);
                            time += 0.2;
                            element.css('animation-delay',time + 's')
                            element.attr('data-animated','true');
                        }

                    }
                    
                });

            }

            //on or scroll, detect elements in view
            $(window).on('scroll resize', function() {
                check_if_in_view()
            })
            //trigger our scroll event on initial load
            $(window).trigger('scroll');

        })
    </script>
</body>
</html>