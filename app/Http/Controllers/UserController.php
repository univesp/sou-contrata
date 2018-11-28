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
    public function index() {
        //
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

        $user->id = $request->id;
        $user->name = $request->name;
        $user->login = $request->login;
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
            ->orWhere('email', $request->email)
            ->first();

        if($login && isset($login->email)) {
            Helper::createSession($login, $request);
            return redirect('/login');
        } else {
            return redirect('/login');
        }

    }

    public function logoff(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
