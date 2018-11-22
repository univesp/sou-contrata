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

Route::post('/store', 'UserController@store')->name('store');

Route::post('/documents', 'UserController@documents')->name('documents');

Route::get('/selective-processes', function () {
    return view('vacancy/selective-processes');
});

Route::get('/selective-processes1', function () {
    return view('vacancy/selective-processes1');
});


Route::get('/vague-discipline/{id}', function ($id) {
    $data = \App\Vacancy::with('vacancy_criteria')->with('services')->find($id);
    $vacancies = \App\Criterion::with('vacancy_criteria')
        ->whereHas('vacancy_criteria',function ($query){
            $query->where('vacancy_id', '=', '1');
        },'=',$id)->get();
    //return  $result;
    return view('professor/vague-discipline', compact(['data','vacancies']));
});

Route::post('/vague-discipline','CriterionController@store');


// Personal data
Route::get('/personal-data', function () {
    return view('professor/personal-data');
})->name('professorPersonalData');

Route::post('/personal-data/store', 'PersonalDataController@store')->name('store');

// Academic data
Route::get('/academic-data', function () {
    return view('professor/academic-data');
})->name('professorAcademicData');

// Process data
Route::get('/process', function () {
    return view('vacancy/process');
})->name('vacancyProcess');

Route::post('/document_academic', 'ScholarityController@store')->name('store');

Route::post('/academic-data/data', 'ScholarityController@document_academic')->name('document_academic');
