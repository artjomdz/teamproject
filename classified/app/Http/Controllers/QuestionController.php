<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;

class QuestionController extends Controller
{

    public function index () {
        // $res = DB::table('questions')->get();
        $allQuestions = Question::all();
        
        return view('index')->with('questions', $allQuestions);
    }

    public function show ($id)
    {
        
        $question = Question::find($id);
        $responses = Question::count();
        $user = \Auth::id();
        $name = \Auth::user();
        // we get all the answers for the set question
        $answers = Answer::where('question_id', $id)->get();
        // $answers = $question->answers()->oldest()->get(); this wat we can pass some logic into query
        // $answers = $question->answers; this way we do $question->answers()->get()

        $answers_to_question = Answer::where('user_id', '=', $user);
        
        
        return view('_partials/show', 
        compact(
                'question', 
                'responses', 
                'answers',
                'id',
                'answers_to_question',
                'name')
            );
    }


    public function submitAnswer (Request $request, $id)
    {
        // form validation
        $this->validate($request,[
            'answer_text' => 'required'
        ]);

        $answer = new Answer;
        $answer->user_id = \Auth::id();
        $answer->question_id = $id;
        $answer->text = $request->input('answer_text');
        $answer->save();
        return redirect("/questions/$id" );
    }

    public function vote ($id)
    {
        $request = request();
        
        $answer = Answer::find($id);
        
        $vote = new \App\Vote;
        $vote->answer_id = $answer->id;
        // dd($vote->answer_id);
        
        if ($request->input('up')) {
            $vote->vote = 1;
            $answer->rating++; 
        } elseif($request->input('down')) {
            $vote->vote = -1;
            $answer->rating--; 
        }
        
        $vote->save();
        $answer->save();
        
        return back();
    }
}
