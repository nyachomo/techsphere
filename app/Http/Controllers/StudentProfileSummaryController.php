<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Referee;
use App\Models\StudentProfileDocument;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\EducationExperience;
use App\Models\WorkExperience;
use App\Models\StudentSkill;
use App\Models\ProfessionalSummary;

class StudentProfileSummaryController extends Controller
{
    //
    public function showStudentProfileSummary(){
        if(Auth::check() && Auth::user()->role=="Student"){
        $phone=Auth::user()->phone;
        $student=Student::where('phone',$phone)->first();
        $id=$student->id;
        $educations=EducationExperience::with('achievements')->where('student_id',$id)->orderBy('id','DESC')->get();
        $works=WorkExperience::with('achievements')->where('student_id',$id)->orderBy('id','DESC')->get();
        $referees=Referee::where('student_id',$id)->get();
        $skills=StudentSkill::where('student_id',$id)->get();
        $profesionalSummary=ProfessionalSummary::where('student_id',$id)->first();

        return view('students.profileSummary',compact(['student','educations','works','referees','skills','profesionalSummary']));
        }else{
            Alert::toast('Could not login', 'error');
          return redirect()->route('login');
        }   
    }
   
}
