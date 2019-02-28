<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use App\Question;
use App\Answer;
use App\Vote;


class QuestionController extends Controller
{
    public function index () {
        
        $allQuestions = Question::all();

        $this->middleware('auth')->except('index');
        return view('questionList', compact(['allQuestions']));
    }

    public function show ($id)
    {
        $question = Question::find($id);
        $responses = Question::count();

        $name = $question->user->name;

        $answers = $question->answers()->with('user:id,name')->oldest()->get();

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
        
        $answer->text = $request->input('answer_text');
        $answer->question_id = $id;
        $answer->user_id = \Auth::id();
        $answer->save();

        return redirect()->route("questions.all", ['id' => $id]);

    }

    public function vote ($answer_id)
    {
        $request = request();
        
        $answer = Answer::find($answer_id);
        
        $vote = new Vote;
        $vote->answer_id = $answer->id;
        
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
