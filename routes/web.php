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

//Vacancy
Route::get('/edict/{id}', function ($id) {
    $data = \App\Vacancy::with('edict')->find($id);
    return view('vacancy/index',compact('data', $data));
});

//Login
Route::get('/login', function () {
    return view('vacancy/login');
});

Route::get('/form', function () {
    return view('user/form');
});

Route::get('/login', function () {

    return view('vacancy/login');
});

Route::post('/login', 'UserController@login')->name('login');

Route::get('/process', function () {
    
    return view('vacancy/process');
});

Route::post('/store', 'UserController@store')->name('store');

Route::post('/documents', 'UserController@documents')->name('documents');

Route::get('/processos-seletivos', function () {
    return view('vacancy/processos-seletivos');
});

Route::get('/processos-seletivos1', function () {
    return view('vacancy/processos-seletivos1');
});

Route::get('/processos-seletivos2', function () {
    return view('vacancy/processos-seletivos2');
});

Route::get('/processos-seletivos3', function () {
    return view('vacancy/processos-seletivos3');
});

Route::get('/processos-seletivos4', function () {
    return view('vacancy/processos-seletivos4');
});

Route::get('/processos-seletivos5', function () {
    return view('vacancy/processos-seletivos5');
});

Route::get('/processos-seletivos6', function () {
    return view('vacancy/processos-seletivos6');
});

Route::get('/vaga-disciplina', function () {
    return view('professor/vaga-disciplina');
});

Route::get('/vaga-disciplina1', function () {
    return view('professor/vaga-disciplina1');
});

Route::get('/dados-pessoais', function () {
    return view('professor/dados-pessoais');
});

Route::get('/dados-academicos', function () {
    return view('professor/dados-academicos');
});

Route::get('/process', function () {
    return view('vacancy/process');
});
