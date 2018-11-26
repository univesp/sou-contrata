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



Route::get('/', function () {
    $data = \App\Vacancy::with('edict')->orderBy('created_at','desc')->paginate(20);
    return view('vacancy/index',compact('data', $data));
});

//Vacancy
Route::get('/vacancy','ListEditalController@index')->middleware(['check.user']);

Route::post('/edict/{id}', 'EdictController@list');

Route::get('/edict/{id}', function ($id ) {
    $data = \App\Vacancy::with('edict')->find($id);
    return view('vacancy/edicts',compact('data', $data));
});

//Login
Route::get('/login', function () {
    return view('vacancy/login');
});


Route::get('/form', function () {
    return view('user/form');
})->middleware(['check.user']);

Route::post('/login', 'UserController@login')->name('login');

Route::post('/store', 'UserController@store')->name('store')->middleware(['check.user']);

Route::post('/documents', 'UserController@documents')->name('documents')->middleware(['check.user']);

Route::get('/selective-processes', function () {
    return view('vacancy/selective-processes');
})->middleware(['check.user']);

Route::get('/selective-processes1', function () {
    return view('vacancy/selective-processes1')->middleware(['check.user']);
});


Route::get('/vague-discipline/{id}', function ($id, Request $request) {
    $data = \App\Vacancy::with('vacancy_criteria')->with('services')->find($id);
    $vacancies = \App\Criterion::with('vacancy_criteria')
        ->whereHas('vacancy_criteria',function ($query) use (&$id){
            $query->where('vacancy_id', '=', $id);
        })->get();
    //return  $result;
    $request->session()->put('vagueId', $id);
    return view('professor/vague-discipline', compact(['data','vacancies', 'vagueId']));
})->name("vagueDiscipline")->middleware(['check.user']);

Route::post('/vague-discipline','CriterionController@store')->middleware(['check.user']);


// Personal data
// Route::get('/personal-data', function () {
//     return view('professor/personal-data');
// })->name('professorPersonalData');

// Route::post('/personal-data/store', 'PersonalDataController@store')->name('store');

Route::resource('/personal-data', 'PersonalDataController', ['only' => ['index', 'store']])->middleware(['check.user']);

// Academic data
Route::get('/academic-data', function () {
    return view('professor/academic-data');
})->name('professorAcademicData')->middleware(['check.user']);

// Process data
Route::get('/process', function () {
    return view('vacancy/process');
})->name('vacancyProcess')->middleware(['check.user']);

Route::post('/document_academic', 'ScholarityController@store')->name('store')->middleware(['check.user']);

Route::post('/academic-data/data', 'ScholarityController@document_academic')->name('document_academic')->middleware(['check.user']);
