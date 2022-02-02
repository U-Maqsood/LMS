<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModel as Course;
use App\Models\GalleryModel as Gallery;
use App\Models\InstructorModel as Instructor;
use Illuminate\Support\Facades\Storage;

class InstructorCourseController extends Controller
{
    public function list(){

        $courses = Course::where('instructor',session('online_instructor')->username)->get();
        return view("instructor.courses.list",compact('courses')); 

    }


    public function editIndex($id){
        
        $course = Course::where('id',$id)->first();
        return view('instructor.courses.edit',compact('course'));

    }


    public function edit(Request $req,$id){

        if($req->file('image')){

            $file = $req->file('image');
            $allowed_extensions = ['jpg','png','jpeg'];
            if(!in_array($file->getClientOriginalExtension(),$allowed_extensions)){
                return redirect()->back()->with('error','Allowed files are jpg,jpeg,png!');
            }
        }

        if($req->file('gallery')){

            $files = $req->file('gallery');
            $allowed_extensions = ['jpg','png','jpeg'];

            foreach($files as $file){
                if(!in_array($file->getClientOriginalExtension(),$allowed_extensions)){
                    return redirect()->back()->with('error','Allowed files are jpg,jpeg,png!');
                }
            }
        }

        if(isset($req->price)){
            if(filter_var($req->price, FILTER_VALIDATE_FLOAT) == false) {
                return redirect()->back()->with('error','Enter only numbers in price field!');
            }
            if(isset($req->discounted_price)){
                if(filter_var($req->discounted_price, FILTER_VALIDATE_FLOAT) == false){
                    return redirect()->back()->with('error','Enter only numbers in discounted price field!');
                }
            }
        }

        $course = Course::where('id',$id)->first();

        if($req->add_discounted_price){
            $course->add_discounted_price = 1;
            $course->discounted_price = $req->discounted_price;
        }else {
            $course->add_discounted_price = 0;
            $course->discounted_price = null;
        }

        if($req->featured){
            $course->featured = 1;
        }else {
            $course->featured = 0;
        }
        
        $course->fill($req->all());
        $course->save();
        
        if($req->file('image')){

            if($course->image){
                unlink("./storage/app/".$course->image);
            }
            $foldername = 'courses/'.$course->id.'/thumbnail_image';
            $filename = $file->store($foldername);
            $course->image = $filename;
            $course->save();
        }

        if($req->file('gallery')){
            
            $gallery = Gallery::where('course_id',$course->id)->first();
            if($gallery){
                // unlink("./storage/app/courses/".$course->id."/gallery_images");
                Storage::deleteDirectory('courses/'.$course->id."/gallery_images");
                Gallery::where('course_id',$course->id)->delete();
            }
            foreach($files as $file){
                $gallery = new Gallery;
                $foldername = 'courses/'.$course->id.'/gallery_images';
                $filename = $file->store($foldername);
                $gallery->file_url = $filename;
                $gallery->type = $file->getClientOriginalExtension();
                $gallery->size = $file->getSize();
                $gallery->course_id = $course->id;
                $gallery->save();
            }

        }

        return redirect('instructor/courses')->with('success','Course has been Updated');

    }

    public function view($id){

        $course = Course::where('id',$id)->first();
        $gallery = Gallery::where('course_id',$id)->get();
        return view('instructor.courses.view',compact('course','gallery'));

    }


}
