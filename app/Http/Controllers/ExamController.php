<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {   
        $url = 'https://opentdb.com/api.php?amount=5&amp;category=9&amp;difficulty=easy&amp;type=boolean';
        $fields_string = [];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query ($fields_string));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $json = json_decode($result,true);
        $data = $json['results'];

        curl_close($ch);
        return view('exam',compact('data'));
    }
}
