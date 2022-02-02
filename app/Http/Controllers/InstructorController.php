<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstructorModel as Instructor;
use App\Models\CourseModel as Course;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    public function index(){

        if(session()->has('online_instructor')){

            $courses = Course::where('instructor',session('online_instructor')->username)->get();
            return view("instructor.dashboard",compact('courses'));

        }else {
            return view('instructor.login');
        }
            
    }



    public function login(Request $request){

        $instructor = Instructor::where("username",$request->username)->first();

        if($instructor != null){

            if($instructor->blocked == 1){
                return back()->with("error","Opps you are blocked!");
            }elseif($instructor->blocked == 0){
                if(Hash::check($request->password,$instructor->password)){
                    $request->session()->put("online_instructor",$instructor);
                    return redirect("/instructor");
                }
            }

        }

        return back()->with("error","Wrong username or password");

    }

    public function logout(Request $request){

        $request->session()->pull("online_instructor");
        return redirect("/instructor");

    }


    public function list(){

        $instructors = Instructor::all();
        return view("admin.instructors.list",['instructors'=> $instructors]); 

    }


    public function createIndex(){

        return view('admin.instructors.create');
    }

    public function create(Request $req){

        $username = Instructor::where('username',$req->username)->first();
        if($username != null){
            $username = $username->username;
        }

        if(!$req->username || !$req->password) {
            return redirect()->back()->with('error','Username and password fields are required!');
        }
        elseif ($req->username == $username) {
            return redirect()->back()->with('error','Username already registered!');
        }
        else {
            $instructor = new Instructor;
            $instructor->password = Hash::make($req->password);
            $instructor->fill($req->all());
            $instructor->save();

            if($req->file('profile_pic')){
                $file = $req->file('profile_pic');
                $allowed_extensions = ['jpg','png','jpeg'];
                if(in_array($file->getClientOriginalExtension(),$allowed_extensions)){
                    $foldername = 'instructors/'.$instructor->id;
                    $filename = $file->store($foldername);
                    $instructor->profile_pic = $filename;
                    $instructor->save();
                }else {
                    return redirect()->back()->with('error','Allowed files are jpg,jpeg,png!');  
                }
                
            }

            return redirect('/admin/instructors')->with('success','Instructor has been created');

        }

    }


    public function editIndex($id){
        
        $instructor = Instructor::where('id',$id)->first();
        return view('admin.instructors.edit',['instructor'=>$instructor]);

    }


    public function edit(Request $req,$id){

        $instructor = Instructor::where('username',$req->username)->first();
        if($req->password){
            $instructor->password = Hash::make($req->password);
        }
        if($req->file('profile_pic')){
            $file = $req->file('profile_pic');
            $allowed_extensions = ['jpg','png','jpeg'];
            if(in_array($file->getClientOriginalExtension(),$allowed_extensions)){
                $foldername = 'instructors/'.$instructor->id;
                $filename = $file->store($foldername);
                $instructor->profile_pic = $filename;
            }else {
                return redirect()->back()->with('error','Allowed files are jpg,jpeg,png!');  
            }
        }
        $instructor->fill($req->all());
        $instructor->save();

        return redirect('admin/instructors')->with('success','Instructor has been updated');

    }

    public function block($id){
        
        $instructor = Instructor::where('id',$id)->first();
        $instructor->blocked = 1;
        $instructor->save();
        return redirect('admin/instructors')->with('success','Instructor has been blocked');
        
    }


    public function unblock($id){
    
        $instructor = instructor::where('id',$id)->first();
        $instructor->blocked = 0;
        $instructor->save();
        return redirect('admin/instructors')->with('success','Instructor has been unblocked');
        
    }

    // check active session

    public function checkActiveSession(){

        if (session()->has('online_instructor')){
            return 1;
        }
        return 0;

    }

    
}
