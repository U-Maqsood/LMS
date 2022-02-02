@extends("admin.layouts.layout")
@section("page_title","Instructors")
@section("page_name","Instructors")
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Instructors</a></li>
@endsection
@section('content')


<div class="row">
    <div class="col-md-3 mb-3">
        <x-greetings />
    </div>
    <div class="col-md-3 offset-md-6 text-right mb-3">
        <a href="{{ url('admin/instructors/create') }}" class="btn btn-success">Register New Instructor</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Profile Pic</th>
                    <th scope="col">Username</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Created at</th>
                    {{-- <th scope="col">Updated at</th> --}}
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instructors as $instructor)
                <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <td class="d-flex justify-content-center align-items-center">
                        @if ($instructor->profile_pic)
                        <img src="{{ \URL::to('storage/app').'/'.$instructor->profile_pic }}" width="70px">
                        @endif
                    </td>
                    <td>{{ $instructor->username }}</td>
                    <td>{{ $instructor->dob }}</td>
                    <td>{{ $instructor->address }}</td>
                    <td>{{ $instructor->gender }}</td>
                    <td>{{ $instructor->created_at }}</td>
                    {{-- <td>{{ $instructor->updated_at }}</td> --}}
                    <td>
                        <a href="{{ url('admin/instructors/edit',$instructor->id) }}"
                            class="btn btn-sm btn-primary">Edit</a>
                        @if ($instructor->blocked == 0)
                        <a href="{{ url('admin/instructors/block',$instructor->id) }}"
                            class="btn btn-sm btn-danger">Block</a>
                        @elseif($instructor->blocked == 1)
                        <a href="{{ url('admin/instructors/unblock',$instructor->id) }}"
                            class="btn btn-sm btn-warning">Unblock</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
