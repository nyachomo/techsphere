<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\MOdels\EducationExperience;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\StudentEducationAchivement;

class EducationExperienceController extends Controller
{
    //

        public function showStudentEducationExperience(){
            if(Auth::check() && Auth::user()->role=="Student"){
                $phone=Auth::user()->phone;
                $student=Student::where('phone',$phone)->first();
                $student_id=$student->id;
                $educations=EducationExperience::with('achievements')->where('student_id', $student_id)->orderBy('id','DESC')->get();
                return view('students.education_experience',compact(['student_id','educations','student']));

            }
        }


        public function addEducationExperience(Request $request){
            $validation=$request->validate(
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
                  Alert::toast('Success','success');
                  return redirect()->back();
                
                }else{
                  alert()->error('Failed','Could not save data');
                  return redirect()->back();
                }
        
        }



        public function updateEducationExperience(Request $request){
            $validation=$request->validate(
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
                $id=$request->id;
                $education=EducationExperience::find($id);
                $education->start_date=$request->start_date;
                $education->end_date=$request->end_date;
                $education->school_attended=$request->school_attended;
                $education->course_studied=$request->course_studied;
                $education->grade_scored=$request->grade_scored;
                $education->achivement=$request->achivement;
                $update=$education->update();
                if($update)
                {
                  Alert::toast('Success','success');
                  return redirect()->back();
                
                }else{
                  alert()->error('Failed','Could not update');
                  return redirect()->back();
                }
        
        }


        public function deleteEducationExperience(Request $request){
                $id=$request->id;
                $education=EducationExperience::find($id);
                $delete=$education->delete();
                if($delete)
                {
                  Alert::toast('Success','success');
                  return redirect()->back();
                
                }else{
                  alert()->error('Failed','Could not update');
                  return redirect()->back();
                }
        }

        public function addAchivement(Request $request){
          $validation=$request->validate(
            [
             'student_education_achivement'=>'required|max:191',
             'education_id'=>'required|max:191',
            ],
            [
            'student_education_achivement'=>'Achivement is required',
             'education_id'=>'Education is required',
      
            ]
          );

            $achivement=new StudentEducationAchivement;
            $achivement->student_education_achivement=$request->student_education_achivement;
            $achivement->education_id=$request->education_id;
            $save=$achivement->save();
            if($save)
                {
                  Alert::toast('Success','success');
                  return redirect()->back();
                
                }else{
                  alert()->error('Failed','Could not add');
                  return redirect()->back();
                }
            


        }

        public function updateAchivement(Request $request){
            $id=$request->id;
            $achivement=StudentEducationAchivement::find($id);
            $achivement->student_education_achivement=$request->student_education_achivement;
            $update=$achivement->update();
            if($update)
                {
                  Alert::toast('Success','success');
                  return redirect()->back();
                
                }else{
                  alert()->error('Failed','Could not add');
                  return redirect()->back();
                }
            


        }


        public function deleteAchivement(Request $request){
          $id=$request->id;
          $achivement=StudentEducationAchivement::find($id);
          $delete=$achivement->delete();
          if($delete)
              {
                Alert::toast('Success','success');
                return redirect()->back();
              
              }else{
                alert()->error('Failed','Could not delete');
                return redirect()->back();
              }

      }


}
