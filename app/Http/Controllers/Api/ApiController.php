<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;

class ApiController extends Controller
{
  
  public function Signup(Request $request){
  	    $response['status'] = false;
        $response['message'] = 'Invalid input';

        if(!empty($request->name) && !empty($request->email) && !empty($request->phone) && !empty($request->password) ){
        $ins= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
            'added_by' =>'api'
         ])->id;
        if($ins){
        	$response['status'] = true;
        	$response['message'] = 'Signup successfully';
        }else{
        	$response['message'] = 'Something went wrong';
        }
       
       }
     
     return response()->json(array('response' => $response), 200);
   }
   public function Signin(Request $request){
  	    $response['status'] = false;
        $response['message'] = 'Invalid input';

        if(!empty($request->email) &&!empty($request->password) ){

        $data=Auth::attempt(['email' => $request->email, 'password' => $request->password,'added_by'=>'api','status' => 1]);
        if($data==true){
        	$user = User::select('id','name','email','phone')->where('added_by','=','api')->where('email', $request->email)->first();
        	$response['status'] = true;
        	$response['message'] = 'Login successfully';
        	$response['data'] =$user;
        }else{
        	$response['message'] = 'Something went wrong';
        }
       
       }
     
     return response()->json(array('response' => $response), 200);
     

  }

  public function Userprofile($id){
       $response['status'] = false;
       $response['message'] = 'Invalid request';
       if(!empty($id)){
       	$user = User::select('id','name','email','phone')->where('id', $id)->where('added_by','=','api')->first();
       	  if($user){
       	    $response['status'] = true;
        	$response['message'] = 'record get successfully';
        	$response['data'] =$user;
          }
       }
      return response()->json(array('response' => $response), 200);
  }
  public function Allusers(){
        $response['status'] = false;
        $response['message'] = 'No record found';
        
       	$user = User::select('id','name','email','phone')->where('added_by','=','api')->get();
       	if($user){
       	    $response['status'] = true;
        	$response['message'] = 'record get successfully';
        	$response['data'] =$user;
        }
       
      return response()->json(array('response' => $response), 200);
  }

  public function searchUser($val){
        $response['status'] = false;
        $response['message'] = 'No record found';
        
        $user = User::select('name')
            ->where('name','like',$val.'%')
            ->get();

        $html = '<ul>';
        foreach($user as $k=>$v){
            $html .= '<li>'.$v->name.'</li>';
        }  
        $html .= '</ul>';

        if($user){
            $response['status'] = true;
            $response['message'] = 'record get successfully';
            $response['data'] =$html;
        }
       
      return response()->json(array('response' => $response), 200);
  }

  public function Updateprofile(Request $request){
  	    $response['status'] = false;
        $response['message'] = 'Invalid input';

        if(!empty($request->user_id) && !empty($request->name) && !empty($request->email) && !empty($request->phone)){

        $ins= User::where('id','=',$request->user_id)->where('added_by','=','api')->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
         ]);
       
        if($ins==1){
        	$response['status'] = true;
        	$response['message'] = 'Profile update successfully';
        }else{
        	$response['message'] = 'Something went wrong';
        }
       
       }
     
     return response()->json(array('response' => $response), 200);
   }

}