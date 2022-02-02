@extends('layouts.layout')
@section('page_title')
    @if (isset($title))
        {{ $title }}
    @elseif (isset($search_keyword))
        Courses
    @endif
@endsection
@section('stylesheet')
<style>
    .welcome-container {
        background: url("{{ URL::to('public') }}/assets/images/home1.jpg") no-repeat center;
        background-size: cover;
        height: 500px;
    }

    .course {
        box-shadow: 0px 0px 7px 1px grey;
    }

    .featured-btn {
        top: 10px;
        right: 10px;
    }

    .aspect-img {
        width: 100%;
        padding-bottom: 56.25%;
        /* 16:9 ratio = 9 / 16 = 0.5625 */
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: cover !important;
    }

    .card{
        max-width: 700px;
    }

</style>
@endsection
@section('content')


@if (isset($title))
<div class="container-fluid welcome-container d-flex justify-content-center align-items-center">
    <div class="card bg-dark px-5 py-3 text-white text-center ">
        <h1>{{ $title }}</h1>
        <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. At earum labore voluptate maxime quasi. Cum itaque labore architecto doloribus delectus.</p>
    </div>
</div>
@else
<div class="container-fuild pt-5">
    <div class="container mt-5 pt-5">
        <div class="row">
            <h5>Search resuls for: <span class="text-primary h3 ms-3">{{ $search_keyword }}</span></h5>
        </div>
    </div>
</div>
@endif

@if (count($courses) > 0)
<div class="container mt-5 mb-3 ">
    <div class="row">
        @foreach ($courses as $course)
        <div class="col-md-4 col-lg-3 col-sm-6 mb-4 animate__animated" data-animate='animate__fadeInUp' data-animated='false'>
            <x-course_card :course="$course" />
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="text-left">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@else
<div class="container mt-5 mb-3">
    <div class="row">
        <p>
            No result was found!
        </p>
    </div>
</div>    
@endif


@endsection
