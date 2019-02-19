<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index () {
        return 'This is a list of questions';
    }

    public function show ($id)
    {
        
        var_dump($id);
        return 'This is a detail of a question';
    }
}
