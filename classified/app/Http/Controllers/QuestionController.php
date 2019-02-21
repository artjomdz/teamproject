<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;

class QuestionController extends Controller
{
    private $id = null;

    public function index () {
        // $res = DB::table('questions')->get();
        $allQuestions = Question::all();
        
        return view('index')->with('questions', $allQuestions);
    }

    public function show ($id)
    {
        $this->id = $id;
        // dd($this->id);
        // $res = DB::table('answers')->where('question_id', $id)->get();
        // dd($id);
        $question = Question::find($id);
        $responses = Question::count();
        $user = \Auth::id();
        $answers = Answer::where('question_id', $id)->get();
        // $answers = $question->answers()->oldest()->get();
        $answers_to_question = Answer::where('user_id', '=', $user);
        // $user = User::where('id', '=', $id);
        // dd($user);
        dd($answers_to_question);
        return view('_partials/show', 
        compact(
                'question', 
                'responses', 
                'answers',
                'id',
                'answers_to_question')
            );
    }

    private function getCurrentid() {
        return $this->id;
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
}
