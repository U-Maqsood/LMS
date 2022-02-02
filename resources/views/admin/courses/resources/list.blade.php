@extends("admin.layouts.layout")
@section("page_title")
{{ $course->title }} Resources
@endsection
@section("page_name")
<span class="text-primary">{{ $course->title }}</span> Resources
@endsection
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('admin/courses')}}">Courses</a></li>
<li class="breadcrumb-item active">{{ $course->title }} Resources</li>
@endsection
@section('content')

<div class="row">
    <div class="col-md-3 mb-3">
        <x-greetings />
    </div>
    <div class="col-md-3 offset-md-6 text-right mb-3">
        <a href="{{ url('admin/courses/resources/'.$course->id.'/create') }}" class="btn btn-success">Add Resource</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    {{-- <th scope="col">File</th> --}}
                    <th scope="col">Image</th>
                    <th scope="col">Size</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resources as $resource)
                <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <td>{{ $resource->title }}</td>
                    {{-- <td>{{ $resource->filename }}</td> --}}
                    <td class="d-flex justify-content-center align-items-center">
                        @if ($resource->image)
                        <img src="{{ \URL::to('storage/app').'/'.$resource->image }}" width="70px">
                        @endif
                    </td>
                    <td>{{ $resource->file_size }}</td>
                    <td>{{ $resource->created_at }}</td>
                    <td>{{ $resource->updated_at }}</td>
                    <td>
                        <a href="{{ url('admin/courses/resources/'.$course->id.'/edit',$resource->id) }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                        <a href="{{ url('admin/courses/resources/'.$course->id.'/delete',$resource->id) }}" class="btn btn-sm btn-danger mb-1">Delete</a>
                        <a href="{{ url('admin/courses/resources/'.$course->id.'/download',$resource->id) }}" class="btn btn-sm btn-success mb-1">Download</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
