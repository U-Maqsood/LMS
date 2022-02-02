@extends("admin.layouts.layout")
@section("page_title","View Course")
@section("page_name","View Course")
@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{url('admin/courses')}}">Courses</a></li>
    <li class="breadcrumb-item active">View</a></li>
@endsection
@section('content')

<div class="row">
    @if ($course->image)
    <div class="col-md-6">
        <a href="{{ \URL::to('storage/app').'/'.$course->image }}" width="100%">
            <img src="{{ \URL::to('storage/app').'/'.$course->image }}" width="100%">
        </a>
    </div>
    @endif
    <div class="{{ ($course->image) ? 'col-md-6' : 'col-12' }} pl-3">
        <h1>{{ $course->title }}</h1>
        <p>Instructed by:<span class="text-info ml-2">{{ $course->instructor }}</span></p>
        <p>
            @if ($course->price)
            <span class="me-1">{{ $global_settings->currency_symbol }} </span>
            <span class="text-primary h4">{{ ($course->discounted_price) ? $course->discounted_price : $course->price }}</span>
            <span class="ms-1"><del>{{ ($course->discounted_price) ? $course->price : '' }}</del></span>
            @else
            <span class="text-primary h4">Free</span>
            @endif
        </p>
        <p class="mr-3">Views: <span class="text-success">{{ $course->views }}</span></p>
        @if ($course->featured == 1)
            <span class="text-success">Featured</span>
        @endif
        <hr>
        <p>{{ $course->short_description }}</p>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        @if ($course->long_description)
        <div class="mb-3">
            <h3>Description</h3>
            {!! $course->long_description !!}
        </div>
        @endif
        @if (!$gallery->isEmpty())
        <h3>Gallery Images</h3>
        <div class="row my-3">
            @foreach ($gallery as $image)
            <div class="col-sm-2">
                <a href="{{ \URL::to('storage/app').'/'.$image->file_url }}" data-toggle="lightbox" data-title="{{ $course->title }}" data-gallery="gallery">
                  <img src="{{ \URL::to('storage/app').'/'.$image->file_url }}" class="img-fluid mb-2">
                </a>
            </div>
            @endforeach
        </div>
        @endif
        
        
    </div>
</div>
@endsection
