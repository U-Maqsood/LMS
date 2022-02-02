<?php

namespace App\Http\Controllers;

use App\Models\ResourceModel as Resource;
use App\Models\CourseModel as Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class InstructorResourceController extends Controller
{
    public function list($course_id){

        $resources = Resource::where('course_id',$course_id)->get();
        $course = Course::where('id',$course_id)->first();
        return view("instructor.courses.resources.list",compact('resources','course')); 

    }


    public function createIndex($course_id){

        $course = Course::where('id',$course_id)->first();
        return view('instructor.courses.resources.create',compact('course'));
    }

    public function create(Request $req,$course_id){
        
        if($req->file('image')){

            $file = $req->file('image');
            $allowed_extensions = ['jpg','png','jpeg'];
            if(!in_array($file->getClientOriginalExtension(),$allowed_extensions)){
                return redirect()->back()->with('error','Allowed Image types are jpg,jpeg,png!');
            }
        }

        $resource = new resource;
        $resource->fill($req->all());
        $resource->course_id = $course_id;
        $resource->save();

        if($req->file('file')){

            $file = $req->file('file');
            $foldername = 'courses/'.$course_id.'/resources/'.$resource->id.'/file';
            $file_url = $file->store($foldername);
            $resource->file_url = $file_url;
            $resource->filename = $file->getClientOriginalName();
            $resource->file_size = $file->getSize();
            
        }


        if($req->file('image')){

            $image = $req->file('image');
            $foldername = 'courses/'.$course_id.'/resources/'.$resource->id.'/thumbnail_image';
            $filename = $image->store($foldername);
            $resource->image = $filename;

        }
        
        $resource->save();
        
        return redirect('instructor/courses/resources/'.$course_id)->with('success','Resource has been added');  

    }


    public function editIndex($course_id,$id){
        
        $resource = Resource::where('id',$id)->first();
        $course = Course::where('id',$course_id)->first();
        return view('instructor.courses.resources.edit',compact('course','resource'));

    }


    public function edit(Request $req,$course_id,$id){

        if($req->file('image')){
            
            $file = $req->file('image');
            $allowed_extensions = ['jpg','png','jpeg'];
            if(!in_array($file->getClientOriginalExtension(),$allowed_extensions)){
                return redirect()->back()->with('error','Allowed Image types are jpg,jpeg,png!');
            }
        }


        $resource = Resource::where('id',$id)->first();
        $resource->fill($req->all());
        $resource->course_id = $course_id;
        
        if($req->file('file')){

            unlink("./storage/app/".$resource->file_url);
            
            $file = $req->file('file');
            $foldername = 'courses/'.$course_id.'/resources/'.$resource->id.'/file';
            $file_url = $file->store($foldername);
            $resource->file_url = $file_url;
            $resource->filename = $file->getClientOriginalName();
            $resource->file_size = $file->getSize();
            
        }

        if($req->file('image')){

            if($resource->image){
                unlink("./storage/app/".$resource->image);
            }

            $image = $req->file('image');
            $foldername = 'courses/'.$course_id.'/resources/'.$resource->id.'/thumbnail_image';
            $filename = $image->store($foldername);
            $resource->image = $filename;

        }

        $resource->save();
        
        return redirect('instructor/courses/resources/'.$course_id)->with('success','Resource has been updated');  

    }

    public function delete($course_id,$id){

        Storage::deleteDirectory('courses/'.$course_id.'/resources/'.$id);
        Resource::where('id',$id)->delete();
        return redirect('instructor/courses/resources/'.$course_id)->with('success','Resource has been deleted');
        
    }

    public function download($course_id,$id){

        $resource = Resource::where('id',$id)->first();
        $file = storage_path().'/app/'.$resource->file_url;
        return Response::download($file,$resource->title);

    }

}
