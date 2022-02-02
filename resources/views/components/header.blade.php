<div class="w-100 nav position-absolute animate__animated" data-animate='animate__fadeInDown' data-animated='false'>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-md-5 py-3 w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ URL::to('storage/app').'/'.$global_settings->site_logo }}" width="30" height="30"
                    class="d-inline-block align-top" alt=" ">
                {{ $global_settings->site_name }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-lg-5 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ (request()->is('courses/*') || request()->is('courses')) ? 'active' : '' }}" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Courses
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                              <a class="dropdown-item py-2 {{ (request()->is('courses/featured')) ? 'active' : '' }}" href="{{ url('courses/featured') }}">Featured</a>
                            </li>
                            <li>
                              <a class="dropdown-item py-2 {{ (request()->is('courses/top-pickups')) ? 'active' : '' }}" href="{{ url('courses/top-pickups') }}">Top Pickups</a>
                            </li>
                            <li>
                              <a class="dropdown-item py-2 {{ (request()->is('courses/rising-stars')) ? 'active' : '' }}" href="{{ url('courses/rising-stars') }}">Rising Stars</a>
                            </li>
                            <li>
                              <a class="dropdown-item py-2 {{ (request()->is('courses')) ? 'active' : '' }}" href="{{ url('courses') }}">All Courses</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form action="{{ url('search/courses') }}" method="get" class="d-flex text-center mb-3 mb-lg-0">
                    <input class="form-control me-2" type="search" placeholder="Search" name="q" aria-label="Search for Courses..." required>
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="{{ url('login') }}" class="btn btn-outline-primary mx-2">Login</a>
                <a href="{{ url('signup') }}" class="btn btn-light">Sign up</a>
            </div>
        </div>
    </nav>
</div>

