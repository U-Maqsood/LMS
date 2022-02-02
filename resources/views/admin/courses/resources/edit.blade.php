@extends("admin.layouts.layout")
@section("page_title")
Edit {{ $course->title }} Resource
@endsection
@section("page_name")
Edit <span class="text-primary">{{ $course->title }}</span> Resource
@endsection
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('admin/courses')}}">Courses</a></li>
<li class="breadcrumb-item"><a href="{{url('admin/courses/resources',$course->id)}}">{{ $course->title }} Resources</a></li>
<li class="breadcrumb-item active">Edit</a></li>
@endsection
@section('content')

<div class="row">
    <div class="col-12">

        <x-greetings />

        <form action="{{ url('admin/courses/resources/'.$course->id.'/edit',$resource->id) }}" id="form" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Title<span class="text-danger">*</span></label><br>
                <input type="text" name="title" class="form-control" value="{{ $resource->title }}"  required>
            </div>
            <div class=" mb-3">
                <label>Description<span class="text-danger">*</span></label><br>
                <textarea id="summernote" class="form-control" name="description" required>
                    @if ($resource->description)
                        {{ $resource->description }}
                    @endif
                </textarea>
            </div>
            <div class="mb-3">
                <label for="image">Upload Thumbnail Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image" accept=".png,.jpg,.jpeg">
                    <label class="custom-file-label" for="image">Choose Image</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="file">Upload File (.zip)</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file" id="file" accept=".zip">
                    <label class="custom-file-label" for="gallery">Choose File</label>
                </div>
            </div>
            <div class="alert alert-danger d-none" id="file-error"></div>
            <div class="row">
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-success btn-block" id="submit-btn"><i class="fas fa-sign-in-alt mr-2"></i>
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#submit-btn').on('click',function(e){
            e.preventDefault();
            $('#file-error').addClass('d-none');
            if($('#file').prop('files')[0]){
                if($('#file').prop('files')[0].type === 'application/zip'){
                $('#form').submit();
                }else {
                $('#file-error').text('Allowed file type is .zip').removeClass('d-none');
                }
            }else {
                $('#form').submit();
            }
            
        })
    })
</script>

@endsection
