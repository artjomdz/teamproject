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
        $name = $question->user->name;
        
        
        // $answers = Answer::where('question_id', $id)->get();
        $answers = $question->answers()->oldest()->get();
        

        return view('_partials/show', compact(
            'question', 
            'responses', 
            'answers',
            'id', 
            'name'
            ));
    }

    public function submitAnswer (Request $request, $id)
    {
        $answer = new Answer;
        // $answer->user_id = \Auth::user()->name;
        
        $answer->text = $request->input('answer_text');
        $answer->question_id = $id;
        $answer->user_id = \Auth::id();
        $answer->save();

        redirect()->route('questions.all', $id);

    }
}
