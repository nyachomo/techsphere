<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalSummary;
use RealRashid\SweetAlert\Facades\Alert;

class ProfessionalSummaryController extends Controller
{
    //

    public function addStudentProfessionalSummary(Request $request){
       $record=ProfessionalSummary::where('student_id',$request->student_id)->first();
       if(empty($record)){
            $summary=new ProfessionalSummary;
            $summary->student_id=$request->student_id;
            $summary->professional_summary=$request->professional_summary;
            $save=$summary->save();
            if($save){
                Alert::toast('Success','success');
                return redirect()->back();
            }else{
                Alert::toast('Failed','info');
                return redirect()->back();
            }
       }else{
        alert()->error('Failed !',' Record Exist');
        return redirect()->back();
       }
       
    }



    public function updateStudentProfessionalSummary(Request $request){
        $id=$request->id;
        $record=ProfessionalSummary::find($id);
        $record->professional_summary=$request->professional_summary;
        $update=$record->save();
        if($update){
            Alert::toast('Success','success');
            return redirect()->back();
        }else{
            alert()->error('Failed !',' Record Exist');
            return redirect()->back();
        }
        
       
        
    }




    public function deleteStudentProfessionalSummary(Request $request){
        $id=$request->id;
        $record=ProfessionalSummary::find($id);
        $delete=$record->delete();
        if($delete){
            Alert::toast('Success','success');
            return redirect()->back();
        }else{
            alert()->error('Failed !',' Could not delete');
            return redirect()->back();
        }
        
       
        
    }





}
