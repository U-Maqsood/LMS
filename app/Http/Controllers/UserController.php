<?php

namespace App\Http\Controllers;

use App\Models\AdminModel as Admin;
use Illuminate\Http\Request;
use App\Models\CourseModel as Course;
use App\Models\UserModel as User;
use App\Models\GalleryModel as Gallery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){

        $featured_courses = Course::where('featured',1)->inRandomOrder()->take(10)->get();
        $most_viewed_courses = Course::orderBy('views','desc')->inRandomOrder()->take(10)->get();
        $latest_courses = Course::orderBy('created_at','desc')->inRandomOrder()->take(10)->get();
        return view('home',compact('featured_courses','most_viewed_courses','latest_courses'));

    }


    public function view($id){

        $course = Course::where('id',$id)->first();
        $course->views = $course->views + 1;
        $course->save();
        return view('view_course',compact('course'));

    }


    public function courses($category) {

        if($category == 'featured') {

            $courses = Course::where('featured',1)->orderBy('updated_at','desc')->paginate(12);
            $title = 'Featured Courses';

        }elseif($category == 'top-pickups') {
            
            $courses = Course::orderBy('views','desc')->paginate(12);
            $title = 'Top Pickups';

        }elseif($category == 'rising-stars') {
            
            $courses = Course::orderBy('created_at','desc')->paginate(12);
            $title = 'Rising Stars';

        }

        return view('courses',compact('courses','title'));

    }


    public function allCourses() {

        $courses = Course::inRandomOrder()->paginate(12);
        $title = 'All Courses';
        return view('courses',compact('courses','title'));

    }

    public function search(Request $req){

        $courses = Course::where('title', 'LIKE', "%{$req->q}%")
                    ->orWhere('tags','LIKE',"%{$req->q}%")
                    ->orWhere('short_description','Like',"%{$req->q}%")
                    ->paginate(12);
        $search_keyword = $req->q; 
        return view('courses',compact('courses','search_keyword'));

    }

    public function test(Request $req) {

        // $admins = Admin::all();
        return 'Route only for testing purposes';

    }

}
