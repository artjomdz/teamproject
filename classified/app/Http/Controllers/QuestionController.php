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
        $allQuestions = Question::all();
        
        return view('index')->with('questions', $allQuestions);
    }

    public function show ($id)
    {
        // $res = DB::table('answers')->where('question_id', $id)->get();
        // dd($id);
        $question = Question::find($id);
        $responses = Question::count();
        // dd($responses);

        // dd($question);


        // $answers = Answer::where('question_id', $id)->get();
        $answers = $question->answers()->oldest()->get();
        

        return view('_partials/show', [
            'question' => $question, 
            'answerList' => $answers,
            'responsCount' => $responses
            ]);
    }
}
