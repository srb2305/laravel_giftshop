<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use DB;

class ContactApiController extends Controller
{
    public function index()
    {
        $data = Contact::select('id','first_name','mobile','email')->get();
        return response()->json($data);
    }

    public function create(Request $request)
    {   
        $name = $request['name'];
        $number = $request['number'];
        $email = $request['email'];

        $insert = [
            'first_name' => $name, 
            'mobile' => $number,
            'email' => $email
        ];
       
        Contact::insert($insert);
        $data['status'] = true;
        $data['message'] = "Insert successfully";
        return response()->json($data);
    }

    public function destroy(Request $request)
    {	
    	$data['status'] = false;
        $data['message'] = "Something went wrong";

    	$id = $request['id'];
    	//Contact::find($id);
    	$check = Contact::where('id',$id)->first();
    	if(!empty($check)){
        	Contact::where('id',$id)->delete();
        	$data['status'] = true;
       		$data['message'] = "Deelted successfully";
    	}else{
    		$data['status'] = false;
       		$data['message'] = "Invalid id";
    	}
      
        return response()->json($data);
    }
}