<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use App\User;
use function Sodium\add;
use Validator;
use Illuminate\Support\Facades\Crypt;
use App\Candidate;

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
        $candidate = [
            'id' => $request->id,
            'name' => $request->name,
            'login' => $request->login,
            'password' => Crypt::encrypt($request->password),
            'email' => $request->email
        ];

        $answer = User::create($candidate);

        $request->session()->put('user', $answer);

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
        $request->session()->flush();

         $login = User::where('password', '=', Crypt::encrypt($request->password))
            ->orWhere('login', $request->login)
            ->get();

        if($login && isset($login[0]->name)) {

            $request->session()->put('user', $login);

            $candidados = Candidate::where('user_id', $login[0]->id)->get();

            if(empty($candidados[0]->id)) {

                return redirect('/personal-data');

            } else {

                return redirect('/vacancy');

            }

        } else {

            return redirect('/login');
        }

    }
}
