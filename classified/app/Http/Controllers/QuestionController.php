<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QuestionController extends Controller
{
    public function index () {
        $res = DB::table('questions')->get();
        dd($res);
        return 'This is a list of questions';
    }

    public function show ($id)
    {
        $res = DB::table('answers')->where('question_id', $id)->get();
        dd($res);
        // return 'This is a detail of a question';
    }
}
