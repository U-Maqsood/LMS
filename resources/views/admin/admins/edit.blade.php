@extends("admin.layouts.layout")
@section("page_title","Edit Admin")
@section("page_name","Edit Admin")
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('admin/user_management')}}">User Management</a></li>
<li class="breadcrumb-item active">Edit</a></li>
@endsection
@section('content')


<div class="row">
    <div class="col-12">

        <x-greetings />

        <form action="{{ url('admin/user_management/edit',$admin->id) }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username">Username</label><br>
                <input type="text" class="form-control" id="username" value="{{ $admin->username }}" disabled>
                <input type="hidden" name="username" value="{{ $admin->username }}">
            </div>
            <div class=" mb-3">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password"
                    placeholder="Provide If you want to change Password" class="form-control">
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
                <input type="date" name="dob" value="{{ $admin->date}}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Address</label><br>
                <input type="text" name="address" value="{{ $admin->address}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="mb-3">Gender</label>
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input" id="male" name="gender" value="male"
                        {{($admin->gender == 'male') ? 'checked' : ''}}>
                    <label class="custom-control-label" for="male">Male</label>
                </div>
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input" id="female" name="gender" value="female"
                        {{($admin->gender == 'female') ? 'checked' : ''}}>
                    <label class="custom-control-label" for="female">Female</label>
                </div>
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" class="custom-control-input" id="others" name="gender" value="others"
                        {{($admin->gender == 'others') ? 'checked' : ''}}>
                    <label class="custom-control-label" for="others">Others</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-block"><i
                            class="fas fa-sign-in-alt mr-2"></i>Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
