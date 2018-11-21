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
    $data = \App\Vacancy::with('edict')->orderBy('created_at','desc')->paginate(20);
    return view('vacancy/index',compact('data', $data));
});

//Vacancy
Route::get('/edict/{id}', function ($id) {
    $data = \App\Vacancy::with('edict')->find($id);
    return view('vacancy/edicts',compact('data', $data));
});

//Login
Route::get('/login', function () {
    return view('vacancy/login');
});

Route::get('/form', function () {
    return view('user/form');
});

Route::post('/login', 'UserController@login')->name('login');

Route::get('/process', function () {

    return view('vacancy/process');
});

Route::post('/store', 'UserController@store')->name('store');

Route::post('/documents', 'UserController@documents')->name('documents');

Route::get('/selective-processes', function () {
    return view('vacancy/selective-processes');
});

Route::get('/selective-processes1', function () {
    return view('vacancy/selective-processes1');
});

Route::get('/selective-processes2', function () {
    return view('vacancy/selective-processes2');
});

Route::get('/selective-processes3', function () {
    return view('vacancy/selective-processes3');
});

Route::get('/selective-processes4', function () {
    return view('vacancy/selective-processes4');
});

Route::get('/selective-processes5', function () {
    return view('vacancy/selective-processes5');
});

Route::get('/selective-processes6', function () {
    return view('vacancy/selective-processes6');
});

Route::get('/vague-discipline', function () {
    return view('teacher/vague-discipline');
});

Route::get('/vague-discipline1', function () {
    return view('teacher/vague-discipline1');
});

Route::get('/personal-data', function () {
    return view('teacher/personal-data');
});

Route::post('/academic-data/store', 'PersonalDataController@store')->name('store');

Route::get('/academic-data', function () {
    return view('teacher/academic-data');
});

Route::get('/process', function () {
    return view('vacancy/process');
});
