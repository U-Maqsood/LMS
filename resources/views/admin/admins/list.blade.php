@extends("admin.layouts.layout")
@section("page_title","User Management")
@section("page_name","User Management")
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
<li class="breadcrumb-item active">User Management</a></li>
@endsection
@section('content')


<div class="row">
    <div class="col-md-3 mb-3">
        <x-greetings />
    </div>
    <div class="col-md-3 offset-md-6 text-right mb-3">
        <a href="{{ url('admin/user_management/create') }}" class="btn btn-success">Register New Admin</a>
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
                @foreach ($admins as $admin)
                <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <td class="d-flex justify-content-center align-items-center">
                        @if ($admin->profile_pic)
                        <img src="{{ \URL::to('storage/app').'/'.$admin->profile_pic }}" width="70px">
                        @endif
                    </td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->dob }}</td>
                    <td>{{ $admin->address }}</td>
                    <td>{{ $admin->gender }}</td>
                    <td>{{ $admin->created_at }}</td>
                    {{-- <td>{{ $admin->updated_at }}</td> --}}
                    <td>
                        <a href="{{ url('admin/user_management/edit',$admin->id) }}" class="btn btn-sm btn-primary ">Edit</a>
                        @if ($admin->blocked == 0)
                        <a href="{{ url('admin/user_management/block',$admin->id) }}" class="btn btn-sm btn-danger">Block</a>
                        @elseif($admin->blocked == 1)
                        <a href="{{ url('admin/user_management/unblock',$admin->id) }}"
                            class="btn btn-sm btn-warning ">Unblock</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
