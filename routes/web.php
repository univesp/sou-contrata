<?php

use Illuminate\Http\Request;
use \App\Vacancy;
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

Route::get('','EdictController@index')->name('home');

//Route::get('','EdictController@home')->name('home');

//Vacancy
Route::get('vacancy','ListEditalController@index')->name('vacancy')->middleware(['check.user']);

// Edict
Route::get('edict/{id}','EdictController@edict')->name('edict');
Route::post('edict/{id}', 'EdictController@list');

//Login
Route::get('login','UserController@index')->name('login')->middleware('logout');
Route::post('login','UserController@login')->name('login')->middleware('logout');

//LOGOFF
Route::get('logoff', 'UserController@logoff')->name('logoff');

// CANDIDATE
Route::get('form','UserController@form')->name('form')->middleware('logout');

Route::post('store', 'UserController@store')->name('store')->middleware('logout');

Route::post('documents', 'UserController@documents')->name('documents')->middleware('login');

//PROCESS
//Route::get('selective-processes','VacancyController@process')->name('selective-processes')->middleware('login');

//PROCESS
Route::get('process','VacancyController@process')->name('process')->middleware('login');

//AREA/SUBAREA
Route::get('area','ScholarityController@area')->name('area');
Route::get('subarea/{area}','ScholarityController@subarea')->name('subarea');

//POSITION
Route::get('position/{id}','PositionController@index')->name("professorPosition")->middleware('login');
Route::post('position','CriterionController@store')->name("professorPosition")->middleware('login');

//CHECKEMAIL
Route::post('email-check','UserController@checkEmail');

//PERSONAL-DATA
//Route::get('personal-data','PersonalDataController@index')->name("professorPersonalData")->middleware('login');
Route::resource('personal-data', 'PersonalDataController', [
    'only' => ['index', 'store'],
    'names' => ['index' => 'professorPersonalData', 'store' => 'professorPersonalData']
])->middleware('login');

//ACADEMIC-DATA
Route::resource('academic-data', 'ScholarityController', [
    'only' => ['index', 'store'],
    'names'=> ['index' => 'professorAcademicData', 'store' => 'professorAcademicData']
])->middleware('login');


//Busca interna pelos dados dos usuarios
Route::get('search-data', function(){
    return view('professor/search-data');
})->name('search-data');

Route::post('search-data/{cpf}','PersonalDataController@searchForTeacher')->name('search');
