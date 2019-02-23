<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allQuestionsOfuser = Question::with('user')->where('user_id', \Auth::id())->get();
        // dd($allQuestionsOfuser);
        return view('admin/admin', compact('allQuestionsOfuser'));
    }
}
