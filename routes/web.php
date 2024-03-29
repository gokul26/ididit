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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/create', function () {
    return view('writenote');
});
Auth::routes();

Route::resource('tasks', 'TasksController');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/like','AjaxController@like');
Route::post('/unlike','AjaxController@unlike');
Route::post('/comment','AjaxController@comment');
Route::post('/getComment','AjaxController@getComment');