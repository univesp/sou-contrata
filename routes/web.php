<?php

use Illuminate\Http\Request;
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

Route::get('', function () {
    $data = \App\Vacancy::with('edict')->orderBy('created_at','desc')->paginate(20);
    return view('vacancy/index',compact('data', $data));
});

//Vacancy
Route::get('vacancy','ListEditalController@index')->middleware(['check.user']);
Route::post('edict/{id}', 'EdictController@list');

Route::get('edict/{id}', function ($id ) {
    $data = \App\Vacancy::with('edict')->find($id);
    return view('vacancy/edicts',compact('data', $data));
});

//Login
Route::get('login', function () {
    return view('vacancy/login');
})->middleware('logout');


Route::get('form', function () {
    return view('user/form');
})->middleware('logout');

Route::post('login', 'UserController@login')->name('login')->middleware('logout');
Route::post('store', 'UserController@store')->name('store')->middleware('logout');
Route::post('documents', 'UserController@documents')->name('documents')->middleware('login');

Route::get('selective-processes', function () {
    return view('vacancy/selective-processes');
})->middleware('login');

Route::get('selective-processes1', function () {
    return view('vacancy/selective-processes1')->middleware('login');
});

//PERSONAL-DATA
Route::resource('personal-data', 'PersonalDataController', [
    'only' => ['index', 'store'],
 ])->middleware('login');

//ACADEMIC-DATA
Route::resource('academic-data', 'ScholarityController', [
    'only' => ['index', 'store'],
    'names' => ['index'=>'professorAcademicData'],
    ])->middleware('login');

//POSITION
Route::get('position/{id}','PositionController@index')->name("professorPosition")->middleware('login');
Route::post('position','CriterionController@store')->middleware('login');

//PROCESS
Route::get('process', function () {
    return view('vacancy.process');
})->middleware('login');

//LOGOFF
Route::get('logoff', 'UserController@logoff')->name('logoff');

//CHECKEMAIL
Route::post('email-check','UserController@checkEmail');


