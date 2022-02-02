@extends("instructor.layouts.layout")
@section("page_title","Courses")
@section("page_name","Courses")
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('instructor')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Courses</a></li>
@endsection
@section('content')

<style>
    .text-vertical{
        writing-mode: vertical-lr;
    }
</style>

<div class="row">
    <div class="col-md-3 mb-3">
        <x-greetings />
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th class="text-vertical" scope="col">Price ({{ $global_settings->currency_symbol }})</th>
                    <th class="text-vertical" scope="col">D/C Price ({{ $global_settings->currency_symbol }})</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th class="text-vertical" scope="col">Gallery</th>
                    <th class="text-vertical" scope="col">Featured</th>
                    <th class="text-vertical" scope="col">Views</th>
                    <th class="text-vertical" scope="col">Resources</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    @if ($course->blocked == 0)
                        <tr>
                            <th>{{ $loop->index + 1 }}</th>
                            <td>{{ $course->title }}</td>
                            <td>{{ ($course->price) ? $course->price : 'Free' }}</td>
                            <td>{{ $course->discounted_price }}</td>
                            <td>{{ $course->short_description }}</td>
                            <td class="d-flex justify-content-center align-items-center">
                                @if ($course->image)
                                <img src="{{ \URL::to('storage/app').'/'.$course->image }}" width="70px">
                                @endif
                            </td>
                            <td>{{ count($course->gallery) }}</td>
                            <td>{{ $course->featured }}</td>
                            <td>{{ $course->views }}</td>
                            <td>{{ count($course->resources) }}</td>
                            <td>
                                @if ($course->tags)
                                    @php
                                        $tags = explode(',',$course->tags)
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <a class="btn btn-sm btn-dark mb-1 text-white">{{ $tag }}</a>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('instructor/courses/view',$course->id) }}" class="btn btn-sm btn-info mb-1">View</a>
                                <a href="{{ url('instructor/courses/edit',$course->id) }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                                <a href="{{ url('instructor/courses/resources',$course->id) }}"
                                    class="btn btn-sm btn-success mb-1">Resources</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
