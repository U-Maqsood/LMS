<!-- Footer -->
<footer class="text-center text-lg-start text-white bg-dark mt-5">
    <!-- Grid container -->
    <div class="container py-4 pb-0">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-8 mb-4 mb-md-0">
                    <h5 class="text-uppercase">
                        <img src="{{ URL::to('storage/app').'/'.$global_settings->site_logo }}" width="30" height="30"class="d-inline-block align-top" alt=" ">
                        {{ $global_settings->site_name }}
                    </h5>

                    <p>
                        {{ $global_settings->short_description }}
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <span  clspanss="text-white">{{ $global_settings->contact_name }}</span>
                        </li>
                        <li>
                            <span  class="text-white">{{ $global_settings->contact_number }}</span>
                        </li>
                        <li>
                            <span  class="text-white">{{ $global_settings->address }}</span>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->

        <hr class="mb-4" />

        <!-- Section: CTA -->
        <section class="">
            <p class="d-flex justify-content-center align-items-center">
                <span class="me-3">Don't have an Account?</span>
                <button type="button" class="btn btn-outline-light btn-rounded">
                    Sign up
                </button>
            </p>
        </section>
        <!-- Section: CTA -->

        <hr class="mb-4" />

        <!-- Section: Social media -->
        <section class="mb-4 text-center">
            <!-- Facebook -->
            <a class="btn btn-outline-light  m-1" href="{{ $global_settings->facebook }}" role="button"><i class="fab fa-facebook"></i></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="{{ $global_settings->twitter}}" role="button"><i class="fab fa-twitter"></i></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="{{ $global_settings->instagram }}" role="button"><i class="fab fa-instagram"></i></a>
            
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        <strong>Copyright &copy; {{date('Y')}} <a href="{{URL::to('/')}}" class="text-primary text-decoration-none">{{ $global_settings->site_name }}</a> </strong>
        All rights reserved.
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
