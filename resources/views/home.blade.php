@extends('layouts.layout')
@section('page_title')
{{ $global_settings->site_name }}
@endsection
@section('stylesheet')
<style>
    .home-container {
        background: url("public/assets/images/home1.jpg") no-repeat center;
        background-size: cover;
        height: 500px;
    }

    .height-100 {
        height: 100%;
    }

    .m-y-6 {
        margin-top: 70px;
        margin-bottom: 70px;
    }

    .course {
        box-shadow: 0px 0px 7px 1px grey;
    }

    .card-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 10px;
        padding-bottom: 10px;
        position:relative;
    }

    .featured-btn {
        top: 10px;
        right: 10px;
    }

    .owl-carousel {
        display: relative;
    }

    .owl-nav {
        position: absolute;
        top: 50%;
        transform: translate(0, -50%);
        left: 0px;
        width: 100%;
        padding-left: 3rem;
        padding-right: 3rem;
        display: flex;
        justify-content: space-between;
    }

    .carousel-icons {
        font-size: 3rem;
        color: rgb(122, 122, 122);
        opacity: 0.7;
    }

    .aspect-img {
        width: 100%;
        padding-bottom: 56.25%;
        /* 16:9 ratio = 9 / 16 = 0.5625 */
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: cover !important;
    }

    .top-pickups-section {
        background: rgb(255, 231, 165);
        box-shadow: 0px 0px 10px 1px grey inset;
    }

</style>
@endsection
@section('content')

<div class="container-fluid home-container d-flex justify-content-center align-items-center">
    <div class="card bg-dark px-5 py-3 text-white text-center">
        <h1>Learning Management System</h1>
        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. At earum labore voluptate maxime quasi. Cum itaque labore architecto doloribus delectus.</p>
    </div>
</div>

<div>
    <div class="m-y-6">
        <div class="container d-flex justify-content-between">
            <h1 class="mb-5 animate__animated" data-animate='animate__fadeInLeft' data-animated='false' >Featured Courses</h1>
            <div>
                <a href="{{ url('courses/featured') }}" class="btn btn-dark animate__animated" data-animate='animate__fadeInRight' data-animated='false'>
                    View All
                </a>
            </div>
        </div>
        <div class="owl-carousel animate__animated" data-animate='animate__fadeInUp' data-animated='false'>
            @foreach ($featured_courses as $course)
            <div class="card-container">
                <x-course_card :course="$course" />
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="py-5 top-pickups-section">
    <div class="container d-flex justify-content-between">
        <h1 class="mb-5 animate__animated" data-animate='animate__fadeInLeft' data-animated='false'>Top Pickups</h1>
        <div>
            <a href="{{ url('courses/top-pickups') }}" class="btn btn-dark animate__animated" data-animate='animate__fadeInRight' data-animated='false'>
                View All
            </a>
        </div>
    </div>
    <div class="owl-carousel animate__animated" data-animate='animate__fadeInUp' data-animated='false'>
        @foreach ($most_viewed_courses as $course)
            <div class="card-container">
                <x-course_card :course="$course" />
            </div>
        @endforeach
    </div>
</div>
<div class="m-y-6">
    <div class="container d-flex justify-content-between">
        <h1 class="mb-5 animate__animated" data-animate='animate__fadeInLeft' data-animated='false'>Rising Stars</h1>
        <div>
            <a href="{{ url('courses/rising-stars') }}" class="btn btn-dark animate__animated" data-animate='animate__fadeInRight' data-animated='false'>
                View All
            </a>
        </div>
    </div>
    <div class="owl-carousel animate__animated" data-animate='animate__fadeInUp' data-animated='false'>
        @foreach ($latest_courses as $course)
            <div class="card-container">
                <x-course_card :course="$course" />
            </div>
        @endforeach
    </div>
</div>

@endsection
