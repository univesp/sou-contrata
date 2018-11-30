<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use App\User;
use function Sodium\add;
use Validator;
use Illuminate\Support\Facades\Crypt;
use App\Candidate;
use App\Scholarity;
use App\Document;

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
    public function index() 
    {
        return view('vacancy/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->session()->flush();

        $user = new User();

        $user->name = $request->name;
        $user->login = $request->login;
        $user->cod_privilege = 1;
        $user->password = Crypt::encrypt($request->password);
        $user->email = $request->email;

        $user->save();

        Helper::createSession($user, $request);
        return redirect('/personal-data');

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

    public function login(Request $request)
    {
        $login = User::where('password', '=', Crypt::encrypt($request->password))
            ->orWhere('email', $request->email)->select('id', 'name' , 'email')->first();
        if($login && isset($login->email)) {
            Helper::createSession($login, $request);
            //pegando candidato cadastrado
            $candidate = Candidate::where('user_id', $request->id)->first();
            if($candidate) {
               return redirect('/process');
            } else {
                return redirect('personal-data');
            }
        } else {
            return redirect('/login');
        }

    }

    public function logoff(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function checkEmail(Request $request)
    {
        if (!preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', (string)$request->email)) {
            return "Eok";
        }

        $email = User::where('email', '=', $request->email)->first();

        if(!empty($email)){
            return "Nok";
        }
        return "Ok";
    }

    public function form() 
    {
        return view('user/form');
    }
}
