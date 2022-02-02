@extends("admin.layouts.layout")
@section("page_title","Global Settings")
@section("page_name","Global Settings")
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
<li class="breadcrumb-item active">System Settings</li>
<li class="breadcrumb-item active">Global Settings</a></li>
@endsection
@section('content')

<div class="row">
    <div class="col-12">

        <x-greetings/>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Site Name<span class="text-danger">*</span></label><br>
                <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}" required>
            </div>
            <div class="mb-3">
                <label for="image">Upload Favicon</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="favicon" id="favicon" accept=".png,.jpg,.jpeg,.ico">
                    <label class="custom-file-label" for="favicon">Choose file</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="logo">Upload Site Logo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="logo" id="logo" accept=".png,.jpg,.jpeg">
                    <label class="custom-file-label" for="logo">Choose files</label>
                </div>
            </div>
            <div class="mb-3">
                <label>Currency Symbol<span class="text-danger">*</span></label><br>
                <input type="text" name="currency_symbol" class="form-control" value="{{ $settings->currency_symbol }}" required>
            </div>
            <div class="mb-3">
                <label>Contact Name</label><br>
                <input type="text" name="contact_name" class="form-control" value="{{ $settings->contact_name }}">
            </div>
            <div class="mb-3">
                <label>Contact Number</label><br>
                <input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
            </div>
            <div class=" mb-3">
                <label>Address</label><br>
                <textarea name="address" class="form-control">{{ $settings->address }}</textarea>
            </div>
            <div class=" mb-3">
                <label>Short Description</label><br>
                <textarea name="short_description" class="form-control">{{ $settings->short_description }}</textarea>
            </div>
            <div class=" mb-3">
                <label>Long Description</label><br>
                <textarea class="form-control" id="summernote" name="long_description">
                        @if ($settings->long_description)
                            {{ $settings->long_description }}
                        @endif
                </textarea>
            </div>
            <div class="mb-3">
                <label>Facebook Url</label><br>
                <input type="text" name="facebook" class="form-control" value="{{ $settings->facebook }}">
            </div>
            <div class="mb-3">
                <label>Instagram Url</label><br>
                <input type="text" name="instagram" class="form-control" value="{{ $settings->instagram }}">
            </div>
            <div class="mb-3">
                <label>Twitter Url</label><br>
                <input type="text" name="twitter" class="form-control" value="{{ $settings->twitter }}">
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
