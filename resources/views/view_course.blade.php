@extends('layouts.layout')
@section('page_title')
    {{ $course->title }}
@endsection    
@section('stylesheet')
<style>

.view-container{
    background:url("{{ URL::to('storage/app').'/'.$course->image }}") no-repeat center;
    background-size: cover;
    height: 400px;
}

</style>
@endsection
@section('content')

<div class="container-fluid view-container d-flex justify-content-center align-items-center">
    <div class="card bg-dark px-5 py-3 text-white text-center w-50%">
        <h1>{{ $course->title }}</h1>
        <span class="text-info h5">{{ $course->instructor }}</span>
        <div>
            @if ($course->price)
                <span class="me-1">{{ $global_settings->currency_symbol }} </span>
                <span class="text-primary h4">{{ ($course->discounted_price) ? $course->discounted_price : $course->price }}</span>
                <span class="ms-1"><del>{{ ($course->discounted_price) ? $course->price : '' }}</del></span>
            @else
                <span class="text-primary h4">Free</span>
            @endif
        </div>
        <p class="mt-1">
            {{ $course->short_description }}
        </p>
    </div>
</div>

<div class="container">
    <div class="row my-5">
        <div class="col-12">
            @if ($course->long_description)
            <div class="mb-3">
                <h3>Description</h3>
                {!! $course->long_description !!}
            </div>
            @endif
            @if (!$course->gallery->isEmpty())
            <h3>Gallery Images</h3>
            <div class="row my-3">
                @foreach ($course->gallery as $image)
                <div class="col-sm-2">
                    <a href="{{ URL::to('storage/app').'/'.$image->file_url }}" data-toggle="lightbox" data-title="{{ $course->title }}" data-gallery="gallery">
                      <img src="{{ URL::to('storage/app').'/'.$image->file_url }}" class="img-fluid mb-2">
                    </a>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        // Ekko Lightbox for Gallery
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

    })
</script>
@endsection