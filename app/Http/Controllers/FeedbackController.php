<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FeedbackController extends Controller
{
    public function create(Request $request){
        $name = $request['name'];
        $rating = $request['rating'];
        $feedback = $request['feedback'];

        $insertArray = [
            'name' => $name,
            'rating' => $rating,
            'feedback' => $feedback
        ];
        DB::table('feedbacks')->insert($insertArray);
        return view('feedback');
    }
}
