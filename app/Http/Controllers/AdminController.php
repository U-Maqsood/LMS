<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel as Admin;
use App\Models\InstructorModel as Instructor;
use App\Models\GlobalSettingsModel as Settings;
use App\Models\CourseModel as Course;
use Illuminate\Support\Facades\Hash;
use Storage;



class AdminController extends Controller
{

    public function index(){

        if(session()->has('online_admin')){
            $admins = Admin::all();
            $instructors = Instructor::all();
            $courses = Course::all();
            return view("admin.dashboard",compact('admins','instructors','courses'));
        }else {
            return view('admin.login');
        }

    }


    public function login(Request $request){

        $user = Admin::where("username",$request->username)->first();

        if($user != null){

            if($user->blocked == 1){
                return back()->with("error","Opps you are blocked!");
            }elseif($user->blocked == 0){
                if(Hash::check($request->password,$user->password)){

                    $request->session()->put("online_admin",$user);
                    return redirect("/admin");
                }
            }

        }

        return back()->with("error","Wrong username or password");

    }

    public function list(Request $request){

        $admins = Admin::all();
        return view("admin.user_management.list",compact('admins'));

    }


    public function createIndex(){

        return view('admin.user_management.create');
    }

    public function create(Request $req){

        $username = Admin::where('username',$req->username)->first();
        if($username != null){
            $username = $username->username;
        }

        if(!$req->username || !$req->password ) {
            return redirect()->back()->with('error','Username and password fields are required');
        }
        elseif ($req->username == $username) {
            return redirect()->back()->with('error','username already registered!');
        }
        else {
            
            $admin = new Admin;
            $admin->password = Hash::make($req->password);
            $admin->fill($req->all());
            $admin->save();
            if($req->file('profile_pic')){
                $file = $req->file('profile_pic');
                $allowed_extensions = ['jpg','png','jpeg'];
                if(in_array($file->getClientOriginalExtension(),$allowed_extensions)){
                    $foldername = 'admins/'.$admin->id;
                    $filename = $file->store($foldername);
                    $admin->profile_pic = $filename;
                    $admin->save();
                }else {
                    return redirect()->back()->with('error','Allowed files are jpg,jpeg,png!');  
                }
                
            }
            

            return redirect('admin/user_management')->with('success','Admin has been Registered');


        }

    }


    public function editIndex($id){
        
        $admin = Admin::where('id',$id)->first();
        return view('admin.user_management.edit',['admin'=>$admin]);

    }


    public function edit(Request $req,$id){
       
        $admin = Admin::where('username',$req->username)->first();
        if($req->password){
            $admin->password = Hash::make($req->password);
        }
        if($req->file('profile_pic')){

            $file = $req->file('profile_pic');
            $allowed_extensions = ['jpg','png','jpeg'];
            if(in_array($file->getClientOriginalExtension(),$allowed_extensions)){
                $foldername = 'admins/'.$admin->id;
                $filename = $file->store($foldername);
                $admin->profile_pic = $filename;
            }else {
                return redirect()->back()->with('error','Allowed files are jpg,jpeg,png!');  
            } 
        }
        $admin->fill($req->all());
        $admin->save();

        return redirect('admin/user_management')->with('success','Admin has been updated');

    }

    public function block($id){
        
        $admin = Admin::where('id',$id)->first();
        $admin->blocked = 1;
        $admin->save();
        return redirect('admin/user_management')->with('success','Admin has been blocked');
    
    }


    public function unblock($id){
        
        $admin = Admin::where('id',$id)->first();
        $admin->blocked = 0;
        $admin->save();
        return redirect('admin/user_management')->with('success','Admin has been unblocked');
    
    }

    public function logout(Request $request){

        $request->session()->pull("online_admin");
        return redirect("/admin");

    }


    // Date Time 

    public function getDateTime(){

        return Date('d-m-Y h:i:sa');

    }

    // check active session

    public function checkActiveSession(){

        if (session()->has('online_admin')){
            return 1;
        }
        return 0;

    }

    // Global Settings

    public function globalSettingsIndex(){

        $settings = Settings::where('id',1)->first();
        return view('admin.system_settings.global_settings',compact('settings'));

    }


    public function globalSettings(Request $req){

        if($req->file('favicon')){

            $favicon = $req->file('favicon');
            $allowed_extensions = ['jpg','png','jpeg','ico'];
            if(!in_array($favicon->getClientOriginalExtension(),$allowed_extensions)){
                return redirect()->back()->with('error','Allowed Image types are jpg,jpeg,png,ico!');
            }

        }

        if($req->file('logo')){

            $logo = $req->file('logo');
            $allowed_extensions = ['jpg','png','jpeg'];
            if(!in_array($logo->getClientOriginalExtension(),$allowed_extensions)){
                return redirect()->back()->with('error','Allowed Image types are jpg,jpeg,png!');
            }

        }

        $settings = Settings::where('id',1)->first();
        $settings->fill($req->all());

        if($req->file('favicon')){
            
            if($settings->site_favicon){
                unlink('./storage/app/'.$settings->site_favicon);
            }
            $favicon = $req->file('favicon');
            $foldername = 'global_settings/favicon';
            $filename = $favicon->store($foldername);
            $settings->site_favicon = $filename;

        }

        if($req->file('logo')){
            
            if($settings->site_logo){
                unlink('./storage/app/'.$settings->site_logo);
            }
            $logo = $req->file('logo');
            $foldername = 'global_settings/logo';
            $filename = $logo->store($foldername);
            $settings->site_logo = $filename;
            
        }

        $settings->save();

        return redirect()->back()->with('success','Settings has been updated');

    }


}