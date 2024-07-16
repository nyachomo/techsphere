<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Communication;

class CommunicationController extends Controller
{
    //

    public function index(){
        return view('admin.communications.index');
    }

    public function adminFetch(){
        $mails=Communication::all();
        return response()->json([
            'mails'=>$mails,
        ]);
    }

    public function adminSend(Request $request){
        $request->validate(
            [
            'subject'=>'required',
            'message'=>'required',
            ],

            [
             'message'=>'Message is required',
             'subject'=>'Subject is required'
            ],
           );

        $comm=new Communication;
        $comm->recipient=$request->recipient;
        $comm->subject=$request->subject;
        $comm->message=$request->message;
        $comm->status="None";
        $comm->replied_by="None";
        $comm->replied_message="None";
        $comm->date_replied="None";
        $comm->save();
        return response()->json([
            'status'=>200,
            'message'=>'Send Successfully',
        ]);

       
    }


    public function adminReply(Request $request){
        $request->validate(
            [
            'message'=>'required',
            ],

            [
             'message'=>'Message is required',
            ],
           );

      $id=$request->message_id;
      $comm=Communication::find($id);
      $comm->replied_message=$request->message;
      $comm->update();
      return response()->json([
        'status'=>200,
        'message'=>"Message replied successfully",
      ]);
    }




}
