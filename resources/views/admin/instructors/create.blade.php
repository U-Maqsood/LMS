@extends("admin.layouts.layout")
@section("page_title","Register New Instructor")
@section("page_name","Register New Instructor")
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('admin/instructors')}}">Instructors</a></li>
<li class="breadcrumb-item active">Create</a></li>
@endsection
@section('content')


<div class="row">
    <div class="col-12">

        <x-greetings />

        <form action="{{ url('admin/instructors/create') }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username">Username<span class="text-danger">*</span></label><br>
                <input type="username" name="username" class="form-control" required>
            </div>
            <div class=" mb-3">
                <label for="username">Password<span class="text-danger">*</span></label><br>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputFile">Upload Profile Picture</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="profile_pic" id="exampleInputFile"
                        accept=".png,.jpg,.jpeg">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
            </div>
            <div class="mb-3">
                <label>Date Of Brith</label><br>
                <input type="date" name="dob" class="form-control">
            </div>
            <div class="mb-3">
                <label>Address</label><br>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label class="mb-3">Gender</label>
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input" id="male" value="male" name="gender" checked>
                    <label class="custom-control-label" for="male">Male</label>
                </div>
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input" id="female" value="female" name="gender">
                    <label class="custom-control-label" for="female">Female</label>
                </div>
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input" id="others" value="others" name="gender">
                    <label class="custom-control-label" for="others">Others</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-block"><i class="fas fa-sign-in-alt mr-2"></i>
                        Create</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
