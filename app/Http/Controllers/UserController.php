<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use App\User;
use function Sodium\add;
use Validator;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller {

    protected $url;

    public function __construct(UrlGenerator $url) {
        $this->url = $url;
    }

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

        $candidate = [
            'name' => $request->name,
            'login' => $request->login,
            'password' => Crypt::encrypt($request->password),
            'email' => $request->email
        ];

        //dd($_POST);

        $answer = User::create($candidate);

        dd($answer);

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    /**
     * Método restponsável pelo acesso ao perfil do candidato cadastro.
     */

    public function login(Request $request) {

        $login = User::where('password', '=', Crypt::encrypt($request->password))
            ->orWhere('login', $request->login)
            ->get();
        
        if($login && isset($login[0]->name)) {

            $request->session()->put('user', $login);

            return redirect('/process');

        } else {

            return redirect('/login');
        }

    }
}
