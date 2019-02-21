<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use App\Question;
use App\Answer;

class QuestionController extends Controller
{
    public function index () {
        // $res = DB::table('questions')->get();
        $res = Question::all();
        
        
        dd($res);
        // return 'This is a list of questions';
    }

    public function show ($id)
    {
        // $res = DB::table('answers')->where('question_id', $id)->get();
        // dd($id);
        $question = Question::find($id);


        // $answers = Answer::where('question_id', $id)->get();
        $answers = $question->answers()->oldest()->get();
        // dd(Question::answer());

        dd($answers);
        // return 'This is a detail of a question';
    }
}
