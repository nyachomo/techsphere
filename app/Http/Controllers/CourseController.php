<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    //

    

    public function index()
    {
       return view('admin.courses.index'); 
    }

    public function fetchcourses(){
      //$courses = Course::orderBy('id', 'DESC')->get();
      $courses = Course::all();
      return response()->json([
          'courses'=>$courses,
        ]);
    }

    //add course
    public function addCourse(Request $request){
       $request->validate(
        [
          'name'=>'required|max:191',
          'level'=>'required|max:191',
          'duration'=>'required|max:191',
          'price'=>'required|max:191',
        ],

        [
            'name.required'=>'Course name is required',
            'level.required'=>'Course level is required',
            'duration.required'=>'Course duration is required',
            'price.required'=>'Course price is required',
          ]
      );

      //add course
      $course=new Course();
      $course->name=$request->name;
      $course->level=$request->level;
      $course->duration=$request->duration;
      $course->price=$request->price;
      $course->save();
      return response()->json([
        'status'=>200,
      ]);

    }

  //edit student
    public function editcourse($id){
      $course=Course::find($id);
      if($course)
      {
         return response()->json([
             'status'=>200,
             'course'=>$course,
            ]);

      }
      else
      {
         return response()->json([
             'status'=>400,
             'message'=>'Course Not Found',
            ]);

      }

   }
  //end of edit student

 public function updatecourse(Request $request,$id){

  $validator=Validator::make($request->all(),[
      'name'=>'required|max:191',
      'level'=>'required|max:191',
      'duration'=>'required|max:191',
      'price'=>'required|max:191',
    ]);

    //check for validation
    if($validator->fails()){
       return response()->json([
        'status'=>400,
        'errors'=>$validator->messages(),
       ]);
    }
    else{
        $course=Course::find($id);
        if($course)
        {
              $course->name=$request->input('name');
              $course->level=$request->input('level');
              $course->duration=$request->input('duration');
              $course->price=$request->input('price');
              $course->update();
  
              return response()->json([
                  'status'=>200,
                  'message'=>'Student Updated Successfully',
                  ]);
        }
        else
        {
           return response()->json([
               'status'=>404,
               'message'=>'Student Not Found',
              ]);

        }


        

    }

 }

 public function deletecourse(Request $request,$id){
    $course=Course::find($id)->delete();
    if($course){
      return response()->json([
        'status'=>200,
        'message'=>'Data deleted successfully',
      ]);
    }else{
      return response()->json([
        'status'=>400,
        'message'=>'Could not delete',
      ]);
    }
    

 }


 //search student
 public function showcourse(Request $request){

  $courses = Course::orderBy('id', 'DESC')->take($request->search)->get();
  $total = count(Course::orderBy('id', 'DESC')->take($request->search)->get());
        return response()->json([
          'courses'=>$courses,
          'total'=>$total,
      ]);

 }
//end of search student

//search student
public function searchcourse(Request $request){
       
  $courses=Course::where('name','Like','%'.$request->search.'%')
  ->orWhere('level','Like','%'.$request->search.'%')
  ->orWhere('duration','Like','%'.$request->search.'%')
  ->orWhere('price','Like','%'.$request->search.'%')->get();

  $total=Course::where('name','Like','%'.$request->search.'%')
  ->orWhere('level','Like','%'.$request->search.'%')
  ->orWhere('duration','Like','%'.$request->search.'%')
  ->orWhere('price','Like','%'.$request->search.'%')->count();

  return response()->json([
      'courses'=>$courses,
      'total'=>$total,
  ]);

  
 }
//end of search student


//search student
public function filtercourse(Request $request){
       
  $courses=Course::where('name','Like','%'.$request->search.'%')
  ->orWhere('level','Like','%'.$request->search.'%')
  ->orWhere('duration','Like','%'.$request->search.'%')
  ->orWhere('price','Like','%'.$request->search.'%')->get();

  $total=Course::where('name','Like','%'.$request->search.'%')
  ->orWhere('level','Like','%'.$request->search.'%')
  ->orWhere('duration','Like','%'.$request->search.'%')
  ->orWhere('price','Like','%'.$request->search.'%')->count();

  return response()->json([
      'courses'=>$courses,
      'total'=>$total,
  ]);

  
 }
//end of search student



}
