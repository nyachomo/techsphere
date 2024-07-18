<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Leed;
use RealRashid\SweetAlert\Facades\Alert;

class LeedController extends Controller
{
    //

    public function showLeeds(){
        if(Auth::check()){
            if(Auth::user()->role=="Data Clerk"){
                $leeds=Leed::all();
                return view('leeds.showLeed',compact(['leeds']));
            }
        }else{
            return redirect()->route('login');
        }
       
    }

   
    public function addLeed(Request $request){
       

        $save=Leed::create($request->all());
        if($save){
            alert()->success('Success','Data saved successfully');
            return redirect()->back();
        }else{
            alert()->error('Failed', 'Could not saved');
            return redirect()->back();
        }
    }

    
    public function updateLeed(Request $request){
        $id=$request->id;
        $leed=Leed::find($id);
        $update=$leed->update($request->all());
        if($update){
            alert()->success('Success','Data has been updated successfully');
            return redirect()->back();
        }else{
            alert()->error('Data saved successfully', 'success');
            return redirect()->back();
        }
    }

}
