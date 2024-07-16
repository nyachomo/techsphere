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
            Alert::toast('Data saved successfully', 'success');
            return redirect()->back();
        }else{
            alert()->error('Data saved successfully', 'success');
            return redirect()->back();
        }
    }

    
    public function updateLeed(Request $request){
        $id=$request->id;
        $leed=Leed::find($id);
        $leed->update($request->all());
    }

}
