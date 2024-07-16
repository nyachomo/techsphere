<?php

namespace App\Http\Controllers;
use App\Models\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{
    //

    public function index(){
        return view('admin.jobs.index');
    }

    public function adminFetchJobs(){
        $jobs=Job::all();
        return response()->json([
            'jobs'=>$jobs,
        ]);
    }

    public function adminAddVacancy(Request $request){
        $request->validate(
            [
                'vacancy_no'=>'required',
                'vacancy_name'=>'required',
                'no_of_position'=>'required',
                'opening_date'=>'required',
                'closing_date'=>'required',
                 'vacancy_description'=>'required',
                'vacancy_responsibility'=>'required',
                'vacancy_qualification'=>'required',
            ],

            [
                'vacancy_no'=>'Vacancy numner required',
                'vacancy_name'=>'Vacancy name required',
                'no_of_position'=>'No of positions required',
                'opening_date'=>'Opening date required',
                'closing_date'=>'Closing date required',
                'vacancy_description'=>'Vacancy Description required',
                'vacancy_responsibility'=>'Responsibility required',
                'vacancy_qualification'=>'Qualification is required',
            ],
           );

            $vacancy=new Job;
            $vacancy->vacancy_no=$request->vacancy_no;
            $vacancy->vacancy_name=$request->vacancy_name;
            $vacancy->no_of_position=$request->no_of_position;
            $vacancy->opening_date=$request->opening_date;
            $vacancy->closing_date=$request->closing_date;
            $vacancy->vacancy_description=$request->vacancy_description;
            $vacancy->vacancy_responsibility=$request->vacancy_responsibility;
            $vacancy->vacancy_qualification=$request->vacancy_qualification;
            $vacancy->vacancy_status="Not Published";
            $vacancy->total_applicants=0;
            
            $vacancy->save();
            return response()->json([
                'status'=>200,
                'message'=>'Send Successfully',
            ]);


    }



    

        //edit student
        public function adminEditJob($id){
            $vacancy=Job::find($id);
            if($vacancy)
            {
               $vacancy_description= strip_tags($vacancy->vacancy_description);
               $vacancy_responsibility= strip_tags($vacancy->vacancy_responsibility);
               $vacancy_qualification= strip_tags($vacancy->vacancy_qualification);
               return response()->json([
                   'status'=>200,
                   'vacancy'=>$vacancy,
                   'vacancy_description'=>$vacancy_description,
                   'vacancy_responsibility'=>$vacancy_responsibility,
                   'vacancy_qualification'=>$vacancy_qualification,
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

       



}
   
