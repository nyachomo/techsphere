<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    //
    public function index(){
        return view('admin.users.index');
    }

    //add course
     public function adduser(Request $request){
        $request->validate(
         [
           'name'=>'required|max:191',
           'email'=>'required|unique:users|email|max:191',
           'phone'=>'required|max:191',
           'role'=>'required|max:191',
           'status'=>'required|max:191',
         ],
 
         [
             'name.required'=>' name is required',
             'email.required'=>' email is required',
             'phone.required'=>' phonenumber is required',
             'role.required'=>'role is required',
             'status.required'=>'Status is required',
           ]
       );
 
       //add course
       $user=new User();
       $password="12345678";
       $user->name=$request->name;
       $user->email=$request->email;
       $user->phone=$request->phone;
       $user->role=$request->role;
       $user->status=$request->status;
       $user->password=Hash::make($password);
       $user->password_plain_text=$password;
       $user->save();
       return response()->json([
         'status'=>200,
       ]);
 
     }

    public function fetchusers(){
        $users = User::all();
        return response()->json([
            'users'=>$users,
            ]);
    }

    //edit student
    public function edituser($id){
        $user=User::find($id);
        if($user)
        {
           return response()->json([
               'status'=>200,
               'user'=>$user,
              ]);
        }
        else
        {
           return response()->json([
               'status'=>400,
               'message'=>'Course Not Found',
              ]);
  
        }
  
     }
    //end of edit student

    //edit student
    public function updateuser(Request $request,$id){
      $validator=Validator::make($request->all(),[
        'name'=>'required|max:191',
        'level'=>'required|max:191',
        'duration'=>'required|max:191',
        'price'=>'required|max:191',
      ]);

      //check for validation
    if($validator->fails())
      {
        return response()->json([
        'status'=>400,
        'errors'=>$validator->messages(),
        ]);
      }
      else
      {
       $user=User::find($id);
       if($user){
        $password="12345678";
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->role=$request->role;
        $user->status=$request->status;
        $user->password=Hash::make($password);
        $user->update();
        return response()->json([
          'status'=>200,
        ]);

       }
      }
      
   }
  //end of edit student

//search student
public function searchuser(Request $request){
       
  $users=User::where('name','Like','%'.$request->search.'%')
  ->orWhere('email','Like','%'.$request->search.'%')
  ->orWhere('phone','Like','%'.$request->search.'%')
  ->orWhere('role','Like','%'.$request->search.'%')
  ->orWhere('status','Like','%'.$request->search.'%')->get();

  return response()->json([
      'users'=>$users,
  ]);

  
 }
//end of search student



}
