@extends("layouts.layout")
@section("page_name","Change Password")
@section("page_title","Change Password")
@section("content")

<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-lg-12">
            @if (Session::has("error"))
               <div class="alert alert-danger">{{session('error')}}</div>
             @endif
             @if (Session::has("success"))
                    <div class="alert alert-success">{{session('success')}}</div>
            @endif

        </div>
    </div>

    @if(session()->get("admin"))

    @php
        $value = Session::get('admin');
    @endphp
    <form action="{{url('/admin/changepassword')}}" method="post">
        <div class="input-group mb-3">
            <input type="username" name="username" class="form-control" placeholder="Username" value="{{$value['username']}}" required disabled>

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
          <button type="submit" class="btn btn-success btn-block"> Change Password</button>
          </div>
        </div>
      </form>
    

 @endif


 @if(session()->get("online_user"))

 @php
     $value = Session::get('online_user');
 @endphp
 <form action="{{url('/user/changepassword')}}" method="post">
     <div class="input-group mb-3">
         <input type="username" name="username" class="form-control" placeholder="Username" value="{{$value['username']}}" required disabled>

         <div class="input-group-append">
           <div class="input-group-text">
             <span class="fas fa-user"></span>
           </div>
         </div>
       </div>
     <div class="input-group mb-3">
       <input type="password" name="password" class="form-control" placeholder="New Password" required>
       <div class="input-group-append">
         <div class="input-group-text">
           <span class="fas fa-lock"></span>
         </div>
       </div>
     </div>

     <div class="row">
       <div class="col-12">
       <button type="submit" class="btn btn-success btn-block"> Change Password</button>
       </div>
     </div>
   </form>


@endif
@endsection
</div>

    </div>