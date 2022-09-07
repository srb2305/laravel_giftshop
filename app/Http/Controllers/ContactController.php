<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    public function index()
    {
        // code...for show data
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
        return view('contact');
    }

}
