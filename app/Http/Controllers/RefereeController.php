<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referee;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class RefereeController extends Controller
{
    //

    public function studentShowReferee(){
        //check if the person login
        if(Auth::check() && Auth::user()->role=="Student")
        {
            $phone=Auth::user()->phone;
            $student=Student::where('phone',$phone)->first();
            $student_id=$student->id;
            $referees=Referee::where('student_id', $student_id)->orderBy('id','DESC')->get();
            return view('students.studentReferee',compact(['student_id','referees']));
        }else{
           echo"Login";
        }
       
    }

    public function studentAddReferee(Request $request)
    {
      $request->validate(
        [
            'referee_name'=>'required|min:3',
            'referee_phone'=>'required|unique:referees|min:10|max:10',
            'referee_email'=>'required|email|unique:referees',
            'referee_organisation'=>'required|min:3',
            'referee_position'=>'required|min:3',
            'years_knowing_referee'=>'required',
        ],
        [
            'referee_name.required'=>'referee name is required',
            'referee_phone.required'=>'referee phonenumber is required',
            'referee_email.required'=>'referee email is required',
            'referee_organisation.required'=>'organisation is required',
            'referee_position.required'=>'position is required',
            'years_knowing_referee.required'=>'Year is required',
        ],
    );

           $referee=new Referee;
           $referee->referee_name=$request->referee_name;
           $referee->referee_phone=$request->referee_phone;
           $referee->referee_email=$request->referee_email;
           $referee->referee_organisation=$request->referee_organisation;
           $referee->referee_position=$request->referee_position;
           $referee->years_knowing_referee=$request->years_knowing_referee;
           $referee->student_id=$request->student_id;
           $save=$referee->save();
           if($save){
               return redirect()->back()->with('success', 'Data saved successfully!');
           }else{
             return redirect()->back()->with('Failed', 'Could not saved!');
           }

    }

    public function studentUpdateReferee(Request $request)

    {
        $id=$request->id;
        $referee=Referee::find($id);
        $referee->referee_name=$request->referee_name;
        $referee->referee_phone=$request->referee_phone;
        $referee->referee_email=$request->referee_email;
        $referee->referee_organisation=$request->referee_organisation;
        $referee->referee_position=$request->referee_position;
        $referee->years_knowing_referee=$request->years_knowing_referee;
        $referee->student_id=$request->student_id;
        $update=$referee->update();
        if($update){
            return redirect()->back()->with('Update', 'Data updated successfully!');
        }else{
          return redirect()->back()->with('Failed', 'Could not saved!');
        }
    }


    public function studentDeleteReferee(Request $request)

    {
        $id=$request->id;
        $referee=Referee::find($id);
        $delete=$referee->delete();
        if($delete){
            return redirect()->back()->with('Delete', 'One Record has been deleted');
        }else{
          return redirect()->back()->with('Failed', 'Could not saved!');
        }
    }
}
