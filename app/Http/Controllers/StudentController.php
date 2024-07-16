<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\User;
use App\Models\EducationExperience;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\ProfessionalSummary;
use App\Models\StudentSkill;



class StudentController extends Controller
{
    //

    public function __invoke(Request $request)
    {
        // Controller logic here


    }



    public function index()
    {
       return view('admin.students.index'); 
    }

    public function fetchstudent(){
        $total=Student::count();
        $students=Student::with('course')->get();
        return response()->json([
            'students'=>$students,
            'total'=>$total,
        ]);
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
          'name'=>'required|max:191',
          'email'=>'required|email|max:191',
          'phone'=>'required|max:191',
          'course_id'=>'required|max:191',
        ]);

        //check for validation
        if($validator->fails()){
           return response()->json([
            'status'=>400,
            'errors'=>$validator->messages(),
           ]);
        }
        else{
            $student=new Student;
            $user=new User;
            $student->name=$request->input('name');
            $student->email=$request->input('email');
            $student->phone=$request->input('phone');
            $student->course_id=$request->input('course_id');

            //get user data
            $password="12345678";
            $user->name=$request->input('name');
            $user->role="Student";
            $user->phone=$request->input('phone');
            $user->status="Active";
            $user->email=$request->input('email');
            $user->password=Hash::make($password);
            $user->password_plain_text=$password;

            $student->save();
            $user->save();

            return response()->json([
                'status'=>200,
                'message'=>'Student added Successfully',
               ]);

        }
       

    }

    //edit student
      public function editstudent($id){
         $student=Student::with('course')->find($id);
         if($student)
         {
            return response()->json([
                'status'=>200,
                'student'=>$student,
               ]);

         }
         else
         {
            return response()->json([
                'status'=>400,
                'message'=>'Student Not Found',
               ]);

         }

      }
    //end of edit student


    //update student
    public function updatestudent(Request $request,$id){

        $validator=Validator::make($request->all(),[
            'name'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:191',
            'course'=>'required|max:191',
          ]);
  
          //check for validation
          if($validator->fails()){
             return response()->json([
              'status'=>400,
              'errors'=>$validator->messages(),
             ]);
          }
          else{
              $student=Student::find($id);
              if($student)
              {
                    $student->name=$request->input('name');
                    $student->email=$request->input('email');
                    $student->phone=$request->input('phone');
                    $student->course=$request->input('course');
                    $student->update();
        
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
    //end of update student


    //search student
      public function searchstudent(Request $request){
       
        $students=Student::with('course')->where('name','Like','%'.$request->search.'%')
        ->orWhere('email','Like','%'.$request->search.'%')
        ->orWhere('phone','Like','%'.$request->search.'%')
        ->orWhere('course','Like','%'.$request->search.'%')->get();

        $total=Student::with('course')->where('name','Like','%'.$request->search.'%')
        ->orWhere('email','Like','%'.$request->search.'%')
        ->orWhere('phone','Like','%'.$request->search.'%')
        ->orWhere('course','Like','%'.$request->search.'%')->count();

        return response()->json([
            'students'=>$students,
            'total'=>$total,
        ]);
      
        
      }
    //end of search student

    //search student
    public function showstudent(Request $request){
        $students = Student::with('course')->orderBy('id', 'DESC')->take($request->search)->get();
        $total = count(Student::with('course')->orderBy('id', 'DESC')->take($request->search)->get());
        return response()->json([
            'students'=>$students,
            'total'=>$total,
        ]);
      
        
      }
    //end of search student

    //search student
    public function filterstudent(Request $request){
        $students=Student::with('course')->where('course_id','Like','%'.$request->search.'%')->get();
        $total = count(Student::with('course')->where('course_id','Like','%'.$request->search.'%')->get());
        return response()->json([
            'students'=>$students,
            'total'=>$total,
        ]);
      
        
      }
    //end of search student


    //update student
    public function deletestudent(Request $request,$id){

       $validator=Validator::make($request->all(),[
          'name'=>'required|max:191',
          'email'=>'required|email|max:191',
          'phone'=>'required|max:191',
          'course'=>'required|max:191',
        ]);

        //check for validation
        if($validator->fails()){
           return response()->json([
            'status'=>400,
            'errors'=>$validator->messages(),
           ]);
        }
        else{
            $student=Student::find($id);
            if($student)
            {
                  $student->name=$request->input('name');
                  $student->email=$request->input('email');
                  $student->phone=$request->input('phone');
                  $student->course=$request->input('course');
                  $student->update();
      
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
  //end of update student



  //
  public function profile(){
    if(Auth::check() && Auth::user()->role=='Student'){
      $phone=Auth::user()->phone;
      $student=Student::where('phone',$phone)->first();
      $course=Course::where('id',$student->course_id)->first();
      $professionalSummary=ProfessionalSummary::where('student_id',$student->id)->first();
      $skills=StudentSkill::where('student_id',$student->id)->get();
      return view('students.profile',compact(['phone','student','course','professionalSummary','skills']));

    }
    

    
  }
  //

  public function studentUpdateProfile(Request $request){
    $request->validate(
      [
        'name'=>'required|max:191',
        'email'=>'required|email|max:191',
        'phone'=>'required|size:10',
       
      ],

      [
          'name.required'=>'Fullname is required',
          'email.required'=>'Email is required',
          'phone.required'=>'phone is required',
          'phone.size'=>'phonenumber should be 12 digits',
        ]
      );

      $id=$request->id;
      
      $student=Student::find($id);
      $user=User::where('phone',$request->old_phone)->first();

      $student->name=$request->name;
      $student->phone=$request->phone;
      $student->email=$request->email;

      $user->name=$request->name;
      $user->email=$request->email;
      $user->phone=$request->phone;

      $student->update();
      $user->update();

      return redirect()->back();

  }

  public function studentUpdatePassword(Request $request)
  {


    $request->validate(
      [
        'password'=>'required|max:8',
       
      ],

      [
          'password.required'=>'Password is required',
        ]
      );

      
      $user=User::where('phone',$request->old_phone)->first();
      $user->password=Hash::make($request->password);
      $user->password_plain_text=$request->password;
      $user->update();
      return redirect()->back();




  }

  //STUDENT UPDATE PROFILE IMAGE
  public function studentUpdateProfileImage(Request $request){

          if($request->hasfile('profile_image')){
              $file=$request->file('profile_image');
              $extension=$file->getClientOriginalExtension();
              $fileName=time().'.'.$extension;
              $file->move('uploads/images/',$fileName);
              $id=$request->id;
              $student=Student::find($id);
              $student->profile_image=$fileName;
              $student->update();
              return redirect()->back()->with('success', 'Profile image uploaded successfully.');


          }else{
             echo"Image id Blank";
          }
         

  }
  

  //Student potfolio
   public function studenteducation()
   {
    return view('students.education_experience');
   }

   //student add education experience

   public function addEducationExperience(Request $request){
    $request->validate(
      [
       'start_date'=>'required|max:191',
       'end_date'=>'required|max:191',
       'school_attended'=>'required|max:191',
       'course_studied'=>'required|max:191',
       'grade_scored'=>'required|max:191',
       'achivement'=>'required|max:191',
       'student_id'=>'required|max:191',
      ],
      [
      'start_date'=>'Start date is required',
       'end_date'=>'End date is required',
       'school_attended'=>'School attended is required',
       'course_studied'=>'Course studied is required',
       'grade_scored'=>'Grade scored is required',
       'achivement'=>'Achievement is required',
       'student_id'=>'Student id  is required',

      ]
    );

    $education=new EducationExperience;
    $education->start_date=$request->start_date;
    $education->end_date=$request->end_date;
    $education->school_attended=$request->school_attended;
    $education->course_studied=$request->course_studied;
    $education->grade_scored=$request->grade_scored;
    $education->achivement=$request->achivement;
    $education->student_id=$request->student_id;
    $insert=$education->save();
    if($insert)
    {
      return response()->json([
        'status'=>200,
        'Data has been added successfully',
      ]);
    
    }else{
      return response()->json([
        'status'=>400,
      ]);
    }
   
     
    
   }

    //FETCH EDUCATION EXPERIENCE OF THE STUDENTS
    public function fetchEducationExperience(){
      if(Auth::check()){
        $phone=Auth::user()->phone;
        $student=Student::where('phone',$phone)->first();
        $id=$student->id;
        $educationExperience=EducationExperience::where('student_id',$id)->orderBy('id','DESC')->get();
        return response()->json([
          'status'=>200,
          'message'=>'Success',
          'data'=>$educationExperience
        ]);
      }
    }

    //END OF FETCH EDUCATION EXPERIENCE
    public function editEducationExperience($id){
      $education=EducationExperience::find($id);
      return response()->json([
        'status'=>200,
        'education'=>$education,
       ]);

    }
    //END FETCH EDUCATION EXPERIENCE
     public function updateEducationExperience(Request $request){
      $request->validate(
        [
         'start_date'=>'required|max:191',
         'end_date'=>'required|max:191',
         'school_attended'=>'required|max:191',
         'course_studied'=>'required|max:191',
         'grade_scored'=>'required|max:191',
         'achivement'=>'required|max:191',
        
        ],
        [
        'start_date'=>'Start date is required',
         'end_date'=>'End date is required',
         'school_attended'=>'School attended is required',
         'course_studied'=>'Course studied is required',
         'grade_scored'=>'Grade scored is required',
         'achivement'=>'Achievement is required',
         
  
        ]
      );
      
      $id=$request->education_id;
      $education= EducationExperience::find($id);
      $education->start_date=$request->start_date;
      $education->end_date=$request->end_date;
      $education->school_attended=$request->school_attended;
      $education->course_studied=$request->course_studied;
      $education->grade_scored=$request->grade_scored;
      $education->achivement=$request->achivement;
      $update=$education->update();
      if($update)
      {
        return response()->json([
          'status'=>200,
          'Data has been added successfully',
        ]);
      
      }else{
        return response()->json([
          'status'=>400,
        ]);
      }


     }
    //UPDATE EDUCATION EXPERIENCE


    //END FETCH EDUCATION EXPERIENCE
    public function deleteEducationExperience(Request $request){
      $id=$request->education_id;
      $education=EducationExperience::find($id);
      $delete=$education->delete();
      if($delete)
      {
        return response()->json([
          'status'=>200,
          'Data has been added successfully',
        ]);
      
      }else{
        return response()->json([
          'status'=>400,
        ]);
      }


     }
    //UPDATE EDUCATION EXPERIENCE

}
