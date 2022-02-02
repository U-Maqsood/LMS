@extends("admin.layouts.layout")
@section("page_title","Dashboard")
{{-- @section("page_name","Dashboard") --}}
@section('content')

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner d-flex justify-content-around align-items-center">
                @php
                $blocked = 0;
                foreach($admins as $admin){
                $blocked += $admin->blocked;
                }
                $active = count($admins) - $blocked
                @endphp
                <div>
                    <h3>{{ count($admins) }}</h3>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="mr-1 text-center">
                        <span>Active : {{ $active }}</span>
                    </div>
                    <div class="ml-1 text-center">
                        <span>Blocked : {{ $blocked }}</span>
                    </div>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ url('admin/admins') }}" class="small-box-footer">
                Admins <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner d-flex justify-content-around">
                @php
                $blocked = 0;
                foreach($instructors as $instructor){
                $blocked += $instructor->blocked;
                }
                $active = count($instructors) - $blocked
                @endphp
                <div>
                    <h3>{{ count($instructors) }}</h3>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mr-1 text-center">
                        <span>Active : {{ $active }}</span>
                    </div>
                    <div class="ml-1 text-center">
                        <span>Blocked : {{ $blocked }}</span>
                    </div>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ url('admin/instructors') }}" class="small-box-footer">
                Instructors <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner d-flex justify-content-around">
                @php
                $blocked = 0;
                foreach($courses as $course){
                $blocked += $course->blocked;
                }
                $active = count($courses) - $blocked
                @endphp
                <div>
                    <h3>{{ count($courses) }}</h3>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mr-1 text-center">
                        <span>Active : {{ $active }}</span>
                    </div>
                    <div class="ml-1 text-center">
                        <span>Blocked : {{ $blocked }}</span>
                    </div>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-align-justify"></i>
            </div>
            <a href="{{ url('admin/courses') }}" class="small-box-footer">
                Courses <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

@endsection
