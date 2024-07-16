<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkExperience;
use App\Models\Student;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\EducationExperience;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentWorkAchivement;

class WorkExperienceController extends Controller
{
    //
    public function studentWorkExperience(){
        //check if the person has login
        if(Auth::check() && Auth::user()->role="Student"){
           $phone=Auth::user()->phone;
           $student=Student::where('phone',$phone)->first();
           $student_id=$student->id;
           $works=WorkExperience::with('achievements')->where('student_id',$student_id)->orderBy('id','DESC')->get();
           return view('students.work_experience',compact(['student_id','student','works']));
        }
       
        
    }

    public function addWorkExperience(Request $request){
      //validate data
      $request->validate(
        [
            'start_date'=>'required',
            'end_date'=>'required',
            'company'=>'required',
            'role'=>'required',
            'achivement'=>'required',
            'reason_for_leaving'=>'required'
        ],
        [
            'start_date'=>'Start date is required',
            'end_date'=>'End date is required',
            'company'=>'Company is required',
            'role'=>'Role is required',
            'achivement'=>'Achivemnet is required',
            'reason_for_leaving'=>'Reason for leaving is required',
        ],
      );

      //end of data validation
      $work=new WorkExperience;
      $work->start_date=$request->start_date;
      $work->end_date=$request->end_date;
      $work->company=$request->company;
      $work->role=$request->role;
      $work->achivement=$request->achivement;
      $work->reason_for_leaving=$request->reason_for_leaving;
      $work->student_id=$request->student_id;
      $save=$work->save();
      if($save)
              {
                Alert::toast('Success','success');
                return redirect()->back();
              
              }else{
                alert()->error('Failed','Could not save');
                return redirect()->back();
              }
      
    }

    //FETCHING WORK EXPERIENCE
    public function fetchWorkExperience(){
        //check if the person has login
        if(Auth::check()){
            $phone=Auth::user()->phone;
            $student=Student::where('phone',$phone)->first();
            $student_id=$student->id;
            $works=WorkExperience::where('student_id',$student_id)->orderBy('id','DESC')->get();
            return response()->json([
                'status'=>200,
                'works'=>$works,
            ]);
         }

    }
    //END OF FETCHING WORK EXPERIENCE


    //edit student
    public function editWorkExperience($id){
        $work=WorkExperience::find($id);
        if($work)
        {
           return response()->json([
               'status'=>200,
               'work'=>$work,
              ]);

        }
        else
        {
           return response()->json([
               'status'=>400,
               'message'=>'Company Not Found',
              ]);

        }

     }
   //end of edit student

   //UPDATE WORKEXPERIENCE
    public function updateWorkExperience(Request $request){
        //validate data
      $request->validate(
        [
            'start_date'=>'required',
            'end_date'=>'required',
            'company'=>'required',
            'role'=>'required',
            'achivement'=>'required',
            'reason_for_leaving'=>'required'
        ],
        [
            'start_date'=>'Start date is required',
            'end_date'=>'End date is required',
            'company'=>'Company is required',
            'role'=>'Role is required',
            'achivement'=>'Achivemnet is required',
            'reason_for_leaving'=>'Reason for leaving is required',
        ],
      );

      //end of data validation
      $id=$request->work_id;
      $work= WorkExperience::find($id);
      $work->start_date=$request->start_date;
      $work->end_date=$request->end_date;
      $work->company=$request->company;
      $work->role=$request->role;
      $work->achivement=$request->achivement;
      $work->reason_for_leaving=$request->reason_for_leaving;
      $update=$work->update();

            if($update)
              {
                Alert::toast('Success','success');
                return redirect()->back();
              
              }else{
                alert()->error('Failed','Could not update');
                return redirect()->back();
              }


    }
   //ENDUPDATE WORK EXPERIENCE

   //UPDATE WORKEXPERIENCE
   public function deleteWorkExperience(Request $request){
    //end of data validation
    $id=$request->work_id;
    $work= WorkExperience::find($id);
    $delete=$work->delete();
    if($delete)
        {
            Alert::toast('Success','success');
            return redirect()->back();
        
        }else{
            alert()->error('Failed','Could not delete');
            return redirect()->back();
        }

}
//ENDUPDATE WORK EXPERIENCE



    public function addAchivement(Request $request){
        $achivement=new StudentWorkAchivement;
        $achivement->work_id=$request->work_id;
        $achivement->student_work_achivement=$request-> student_work_achivement;
        $save=$achivement->save();
        if($save)
            {
                Alert::toast('Success','success');
                return redirect()->back();
            
            }else{
                alert()->error('Failed','Could not save');
                return redirect()->back();
            }
    }




    public function updateWorkAchivement(Request $request){
        $id=$request->id;
        $achivement=StudentWorkAchivement::find($id);
        $achivement->student_work_achivement=$request-> student_work_achivement;
        $update=$achivement->update();
        if($update)
            {
                Alert::toast('Success','success');
                return redirect()->back();
            
            }else{
                alert()->error('Failed','Could not update');
                return redirect()->back();
            }

    }


    public function deleteWorkAchivement(Request $request){
        $id=$request->id;
        $achivement=StudentWorkAchivement::find($id);
        $delete=$achivement->delete();
        if($delete)
            {
                Alert::toast('Success','success');
                return redirect()->back();
            
            }else{
                alert()->error('Failed','Could not save');
                return redirect()->back();
            }

    }


}
