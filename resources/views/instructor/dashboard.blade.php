@extends("instructor.layouts.layout")
@section("page_title","Dashboard")
@section("page_name","Dashboard")
@section('content')

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner d-flex justify-content-around align-items-center">
                @php
                $blocked = 0;
                foreach($courses as $course){
                $blocked += $course->blocked;
                }
                $active = count($courses) - $blocked
                @endphp
                <div>
                    <h3>{{ $active }}</h3>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-align-justify"></i>
            </div>
            <a href="{{ url('instructor/courses') }}" class="small-box-footer">
                Courses <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>    


@endsection
