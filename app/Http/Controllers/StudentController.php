<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel as User;
use App\Models\StudentModel as Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function loginIndex(){

        if(session()->has('online_user')){
            return redirect('/');
        }else {
            return view('student.login');
        }
        
    }

    public function login(Request $req){

        $student = Student::where('email',$req->email)->first();
        if($student->email != $req->email || !Hash::check($req->password,$student->password)){
            return redirect()->back()->with('error','Email or Password is incorrect!');
        }

    }

    public function signupIndex(){

        if(session()->has('online_user')){
            return redirect('/');
        }else {
            return view('student.signup');
        }
        
    }

    public function signup(Request $req) {

        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\StudentModel',
            'password' => 'required|confirmed',
        ])->validate();
        
        $student = new Student;
        $student->fill($req->all());
        $student->password = Hash::make($req->password);
        $student->save();

        return redirect('signup');

    }

}
