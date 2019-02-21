<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = DB::table('categories')
        ->orderBy('name', 'desc')
        ->get();
        // dd($categories);
        return view('categories/index')->with('categories', $categories);
    }
}
