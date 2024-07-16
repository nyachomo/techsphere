<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    //
    public function index(){
        return view('admin.companies.index');
    }
 //add course
 public function addCompany(Request $request){
    $request->validate(
     [
       'company_name'=>'required|max:191',
       'company_industry'=>'required|max:191',
       'company_county'=>'required|max:191',
       'company_town'=>'required|max:191',
       'company_contact_person_email'=>'required|email|max:191',
       'company_contact_person_phone'=>'required|max:191',
       'company_contact_person_name'=>'required|max:191',
     ],

     [
       'company_name'=>'Company name is required',
       'company_industry'=>'Industry name is required',
       'company_county'=>'County name is required',
       'company_town'=>'Town name is required',
       'company_contact_person_email'=>'Contact person email is required',
       'company_contact_person_phone'=>'Contact person phone is required',
       'company_contact_person_name'=>'Contact person name is required',
       ]
   );

   //add course
    $company=new Company();
    $company->company_name=$request->company_name;
    $company->company_industry=$request->company_industry;
    $company->company_county=$request->company_county;
    $company->company_town=$request->company_town;
    $company->company_contact_person_name=$request->company_contact_person_name;
    $company->company_contact_person_email=$request->company_contact_person_email;
    $company->company_contact_person_phone=$request->company_contact_person_phone;
    $company->save();
    return response()->json([
        'status'=>200,
    ]);

 }

 //
        public function fetchcompany(){
            $total=Company::count();
            $companys=Company::all();
            return response()->json([
                'companys'=>$companys,
                'total'=>$total,
            ]);
        }








    //edit student
      public function editcompany($id){
        $company=Company::find($id);
        if($company)
        {
           return response()->json([
               'status'=>200,
               'company'=>$company,
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







        //add course
        public function updateCompany(Request $request){
            $request->validate(
            [
            'company_name'=>'required|max:191',
            'company_industry'=>'required|max:191',
            'company_county'=>'required|max:191',
            'company_town'=>'required|max:191',
            'company_contact_person_email'=>'required|email|max:191',
            'company_contact_person_phone'=>'required|max:191',
            'company_contact_person_name'=>'required|max:191',
            ],

            [
            'company_name'=>'Company name is required',
            'company_industry'=>'Industry name is required',
            'company_county'=>'County name is required',
            'company_town'=>'Town name is required',
            'company_contact_person_email'=>'Contact person email is required',
            'company_contact_person_phone'=>'Contact person phone is required',
            'company_contact_person_name'=>'Contact person name is required',
            ]
        );

        //add course
            $id=$request->company_id;
            $company=Company::find($id);
            $company->company_name=$request->company_name;
            $company->company_industry=$request->company_industry;
            $company->company_county=$request->company_county;
            $company->company_town=$request->company_town;
            $company->company_contact_person_name=$request->company_contact_person_name;
            $company->company_contact_person_email=$request->company_contact_person_email;
            $company->company_contact_person_phone=$request->company_contact_person_phone;
            $company->update();
            return response()->json([
                'status'=>200,
            ]);

        }







        public function deleteCompany(Request $request){
            $id=$request->company_id;
            $company=Company::find($id)->delete();
            //$company->delete();
            return response()->json([
                'status'=>200,
            ]);
        }



     //search student
      public function searchcompany(Request $request){
       
        $companys=Company::where('company_name','Like','%'.$request->search.'%')
        ->orWhere('company_industry','Like','%'.$request->search.'%')
        ->orWhere('company_county','Like','%'.$request->search.'%')
        ->orWhere('company_town','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_name','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_email','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_phone','Like','%'.$request->search.'%')->get();

        $total=Company::where('company_name','Like','%'.$request->search.'%')
        ->orWhere('company_industry','Like','%'.$request->search.'%')
        ->orWhere('company_county','Like','%'.$request->search.'%')
        ->orWhere('company_town','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_name','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_email','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_phone','Like','%'.$request->search.'%')->count();

        return response()->json([
            'companys'=>$companys,
            'total'=>$total,
        ]);
      
        
      }
    //end of search student




    //search student
    public function filtercompany(Request $request){
       
        $companys=Company::where('company_name','Like','%'.$request->search.'%')
        ->orWhere('company_industry','Like','%'.$request->search.'%')
        ->orWhere('company_county','Like','%'.$request->search.'%')
        ->orWhere('company_town','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_name','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_email','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_phone','Like','%'.$request->search.'%')->get();

        $total=Company::where('company_name','Like','%'.$request->search.'%')
        ->orWhere('company_industry','Like','%'.$request->search.'%')
        ->orWhere('company_county','Like','%'.$request->search.'%')
        ->orWhere('company_town','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_name','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_email','Like','%'.$request->search.'%')
        ->orWhere('company_contact_person_phone','Like','%'.$request->search.'%')->count();

        return response()->json([
            'companys'=>$companys,
            'total'=>$total,
        ]);
      
        
      }
    //end of search student


    //show company
    public function showCompany(Request $request){
        $companys = Company::orderBy('id', 'DESC')->take($request->search)->get();
        $total = count(Company::orderBy('id', 'DESC')->take($request->search)->get());
        return response()->json([
            'companys'=>$companys,
            'total'=>$total,
        ]);
      
        
      }
    //end of show company







}
