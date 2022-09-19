<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    public function index()
    {
        $data = DB::table('contacts')->get();
        return view('contact-all',compact('data'));
    }

    public function create(Request $request)
    {   
        $name = $request['name'];
        $number = $request['number'];

        $insert = [
            'first_name' => $name, 
            'mobile' => $number
        ];
        DB::table('contacts')->insert($insert);
        //return view('contact');
        return redirect('contact');
    }

    public function destroy($id)
    {
       DB::table('contacts')
       ->where('id',$id)
       ->delete();
        return redirect('contact-all');
    }

    public function edit($id)
    {
        $data = DB::table('contacts')
            ->where('id',$id)
            ->first();
        return view('contact-edit',compact('data'));
    }

    public function update(Request $request){
        $name = $request['name'];
        $number = $request['number'];
        $id = $request['id'];
        
        $update = [
            'first_name' => $name, 
            'mobile' => $number
        ];
        DB::table('contacts')
        ->where('id',$id)
        ->update($update);
        return redirect('contact-all');   
    }
}
