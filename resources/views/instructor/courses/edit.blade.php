@extends("instructor.layouts.layout")
@section("page_title","Edit Course")
@section("page_name","Edit Course")
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('instructor')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('instructor/courses')}}">Courses</a></li>
<li class="breadcrumb-item active">Edit</a></li>
@endsection
@section('content')

<div class="row">
    <div class="col-12">

        <x-greetings />

        <form action="{{ url('instructor/courses/edit',$course->id) }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Title</label><br>
                <input type="text" name="title" class="form-control" value="{{ $course->title }}" disabled>
            </div>
            <div class=" mb-3">
                <label>Short Description<span class="text-danger">*</span></label><br>
                <textarea name="short_description" class="form-control"
                    required>{{ $course->short_description }}</textarea>
            </div>
            <div class=" mb-3">
                <label>Long Description</label><br>
                <textarea class="form-control" id="summernote" name="long_description">
                        @if ($course->long_description)
                            {{ $course->long_description }}
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
                <label for="gallery">Upload Gallery Images</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gallery[]" id="gallery" accept=".png,.jpg,.jpeg"
                        multiple>
                    <label class="custom-file-label" for="gallery">Choose Images</label>
                </div>
            </div>
            <div class="mb-3">
                <label>Select Instructor<span class="text-danger">*</span></label><br>
                <select name="instructor" class="form-control" disabled>
                    <option value="{{ session('online_instructor')->username }}" selected>
                        {{ session('online_instructor')->username }}
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label>Enter Tags</label><br>
                <input type="text" name="tags" value="{{ $course->tags }}"  class="form-control">
            </div>
            <div class="mb-3">
                <label>Price</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">{{ $global_settings->currency_symbol }}</span>
                    <input type="number" step="0.01" class="form-control" name="price" id="price" value="{{ $course->price }}" aria-label="Amount" placeholder="If empty then the course will be free">
                </div>
            </div>
            <div class="mb-3" id="discount_field">
                <label>Discounted Price</label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text">{{ $global_settings->currency_symbol }}</span>
                    <input type="number" step="0.01" min="0.01" class="form-control" name="discounted_price" value="{{ $course->discounted_price }}" id="discounted_price" aria-label="Discounted Amount">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="add_discounted_price" id="discount" {{ ($course->discounted_price) ? 'checked' : '' }}>
                <label class="form-check-label" for="discount">
                    Add Discounted Price
                </label>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="featured" id="featured"
                    {{ ($course->featured == 1) ? 'checked' : '' }} disabled>
                <label class="form-check-label" for="featured">
                    Featured
                </label>
            </div>
            <div class="row">
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-success btn-block"><i
                    class="fas fa-sign-in-alt mr-2"></i>Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
