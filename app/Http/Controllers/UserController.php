<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        //$answer = User::create($request->all());
        // name	login	password	email	cod_privilege
        $user = [
            'name'       => $_POST['name'],
            'rg'         => $_POST['rg'],
            'cpf'        => $_POST['cpf'],
            'email'      => $_POST['email'],
            'curriculum' => $_POST['curriculum'],
        ];

        $usuario = [
            'name' => 'Simone Oliveira',
            'login' => 'osimone',
            'password' => md5('123456'),
            'email' => 'simone@gmail.com',
            'cod_privilege' => 999    
        ];

        $answer = User::create($usuario);

        // dd($answer);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
