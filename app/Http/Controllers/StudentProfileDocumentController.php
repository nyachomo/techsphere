<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentProfileDocument;
use App\Models\Student;
use App\Models\Referee;
use RealRashid\SweetAlert\Facades\Alert;


class StudentProfileDocumentController extends Controller
{
    //
    public function showStudentProfileDocument(){
        if(Auth::check() && Auth::user()->role=="Student")
        {
            $phone=Auth::user()->phone;
            $student=Student::where('phone',$phone)->first();
            $student_id=$student->id;
            $documents=StudentProfileDocument::where('student_id', $student_id)->orderBy('id','DESC')->get();
            return view('students.profileDocument',compact(['student_id','documents']));
        }else{
           echo"Login";
        }
       
    }

    public function addStudentProfileDocument(Request $request){
       $request->validate([
        'document_name'=>'required|min:3',
        'document_type'=>'required',
        'document_file' => 'required',
        'student_id'=>'required',
       ]);

       if($request->hasfile('document_file')){
        $file=$request->file('document_file');
        $extension=$file->getClientOriginalExtension();
        $fileName=time().'.'.$extension;
        $file->move('uploads/images/',$fileName);

        $document=new StudentProfileDocument;
        $document->document_name=$request->document_name;
        $document->document_type=$request->document_type;
        $document->student_id=$request->student_id;
        $document->document_file=$fileName;
        $save=$document->save();
        if($save){
            Alert::toast('Data saved successfully', 'success');
            return redirect()->back();
        }else{
            Alert::toast('Failed! Data could not be saved', 'error');
            return redirect()->back(); 
        }
    }else{
        Alert::toast('No image selected', 'error');
        return redirect()->back();
    }

    }





    public function updateStudentProfileDocument(Request $request){
        $request->validate([
         'document_name'=>'required|min:3',
         'document_type'=>'required',
         'document_file' => 'required',
         'student_id'=>'required',
        ]);
 
        if($request->hasfile('document_file')){
         $file=$request->file('document_file');
         $extension=$file->getClientOriginalExtension();
         $fileName=time().'.'.$extension;
         $file->move('uploads/images/',$fileName);
 
         $id=$request->id;
         $document=StudentProfileDocument::find($id);
         $document->document_name=$request->document_name;
         $document->document_type=$request->document_type;
         $document->student_id=$request->student_id;
         $document->document_file=$fileName;
         $update=$document->update();
         if($update){
             Alert::toast('Success', 'success');
             return redirect()->back();
         }else{
             Alert::toast('Failed! Data could not be saved', 'error');
             return redirect()->back(); 
         }
     }else{
         Alert::toast('No image selected', 'error');
         return redirect()->back();
     }
 
     }





     public function deleteStudentProfileDocument(Request $request){
         $id=$request->id;
         $document=StudentProfileDocument::find($id);
         $delete=$document->delete();
         if($delete){
             Alert::toast('Data deleted', 'success');
             return redirect()->back();
         }else{
             Alert::toast('Failed! Data could not be saved', 'error');
             return redirect()->back(); 
         }
 
     }




}
