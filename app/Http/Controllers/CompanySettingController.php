<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySetting;
use RealRashid\SweetAlert\Facades\Alert;

class CompanySettingController extends Controller
{
    //

    public function showcompanySettings(){
        
        $setting=CompanySetting::get()->first();
        return view('settings.company_settings',compact('setting'));

    }


    public function addcompanySettings(Request $request){
            $request->validate([
                'company_logo'=>'required|file|mimes:png,jpeg,jpg',
                'company_name'=>'required|min:3',
                'company_vission'=>'required|min:3',
                 'company_mission'=>'required|min:3',
                'company_phone'=>'required|min:3',
                 'company_email'=>'required|min:3|email',
                'company_address'=>'required|min:3',
                'facebook_link'=>'required|min:3',
                'twitter_link'=>'required|min:3',
                'instagram_link'=>'required|min:3',
                'linkdln_link'=>'required|min:3',
                'youtube_link'=>'required|min:3',
            ]);

            if($request->hasfile('company_logo')){

                $file=$request->file('company_logo');
                $extension=$file->getClientOriginalExtension();
                $fileName=time().'.'.$extension;
                $file->move('uploads/company_logo/',$fileName);

                $setting=new CompanySetting;
               
                $setting->company_name=$request->company_name;
                $setting->company_vission=$request->company_vission;
                $setting->company_mission=$request->company_mission;
                $setting->company_phone=$request->company_phone;
                $setting->company_email=$request->company_email;
                $setting->company_address=$request->company_address;
                $setting->facebook_link=$request->facebook_link;
                $setting->twitter_link=$request->twitter_link;
                $setting->instagram_link=$request->instagram_link;
                $setting->linkdln_link=$request->linkdln_link;
                $setting->youtube_link=$request->youtube_link;
                $setting->company_logo=$fileName;
                $save=$setting->save();

                if($save){
                    Alert::toast('Success! Data saved successsfully', 'success');
                    return redirect()->back(); 
                }else{
                    alert()->error("Falid","Could Save");
                    return redirect()->back(); 
                }

 
            }else{
                    alert()->error("Falid","No Picture Selected");
                    return redirect()->back(); 
            }
            
    }





    public function updatecompanySettingsLogo(Request $request){
        if($request->hasfile('company_logo')){

            $file=$request->file('company_logo');
            $extension=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $file->move('uploads/company_logo/',$fileName);
 


            $id=$request->id;
            $setting=CompanySetting::find($id);
            $setting->company_logo=$fileName;
            $update=$setting->update();

            if($update){
                Alert::toast('Success! Data saved successsfully', 'success');
                return redirect()->back(); 
            }else{
                alert()->error("Falid","Could Save");
                return redirect()->back(); 
            }
        }else{
            alert()->error("Falid","No Image Selected");
            return redirect()->back(); 
        }


    }





    public function updatecompanySettingsInfo(Request $request){
            $id=$request->id;
            $setting=CompanySetting::find($id);
            $setting->company_name=$request->company_name;
            $setting->company_vission=$request->company_vission;
            $setting->company_mission=$request->company_mission;
            $setting->company_phone=$request->company_phone;
            $setting->company_email=$request->company_email;
            $setting->company_address=$request->company_address;
            $setting->facebook_link=$request->facebook_link;
            $setting->twitter_link=$request->twitter_link;
            $setting->instagram_link=$request->instagram_link;
            $setting->linkdln_link=$request->linkdln_link;
            $setting->youtube_link=$request->youtube_link;
            $update=$setting->update();
            if($update){
                Alert::toast('Success! Data updated successsfully', 'success');
                return redirect()->back(); 
            }else{
                alert()->error("Falid","Could Save");
                return redirect()->back(); 
            }
    }



    public function deletecompanySettings(Request $request){
        $id=$request->id;
        $setting=CompanySetting::find($id);
        $delete=$setting->delete();
        if($delete){
            Alert::toast('Success! Record delete', 'success');
            return redirect()->back(); 
        }else{
            alert()->error("Falid","Could Save");
            return redirect()->back(); 
        }
    }




}
