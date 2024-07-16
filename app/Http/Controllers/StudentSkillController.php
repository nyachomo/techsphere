<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentSkill;
use RealRashid\SweetAlert\Facades\Alert;

class StudentSkillController extends Controller
{
    //

        public function studentAddSkill(Request $request){
            $skill=new StudentSkill;
            $skill->student_skills=$request->student_skills;
            $skill->student_id=$request->student_id;
            $save=$skill->save();
            if($save){
                Alert::toast('Success','success');
                return redirect()->back();
            }else{
                alert()->error('Failed','Could  not Add');
                return redirect()->back();
            }

        }





        public function studentUpdateSkill(Request $request){
            $id=$request->id;
            $skill=StudentSkill::find($id);
            $skill->student_skills=$request->student_skills;
            $update=$skill->update();
            if($update){
                Alert::toast('Success','success');
                return redirect()->back();
            }else{
                alert()->error('Failed','Could  not Update');
                return redirect()->back();
            }

        }







        public function studentDeleteSkill(Request $request){
            $id=$request->id;
            $skill=StudentSkill::find($id);
            $delete=$skill->delete();
            if($delete){
                Alert::toast('Success','success');
                return redirect()->back();
            }else{
                alert()->error('Failed','Could  not delete');
                return redirect()->back();
            }

        }




}
