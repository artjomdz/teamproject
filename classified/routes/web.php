<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'QuestionController@index');

Route::get('/categories', 'CategoryController@index');

Route::get ('/questions', 'QuestionController@index');



Route::get ('/questions/{id}', 'QuestionController@show');
Route::post('/questions/addReply{id}', 'QuestionController@submitAnswer');


Route::resource('home', 'AdminUserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
