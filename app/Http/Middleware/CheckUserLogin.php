<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $user = $request->session()->get('user');
        if (!$user){
            return redirect()->route('login');
        }
        if ($user['permission'] == 1 && Route::getCurrentRoute()->getName() != "professorPersonalData"){
            return redirect()->route('professorPersonalData');
        }elseif ($user['permission'] == 2 && Route::getCurrentRoute()->getName() != "professorAcademicData"){
            return redirect()->route('professorAcademicData');
        }elseif ($user['permission'] == 3 && Route::getCurrentRoute()->getName() == "professorPersonalData"){
            if(!empty(Session::get('edict_id'))){
                return redirect()->route('process');
            }
            return redirect()->route('home');
        }elseif ($user['permission'] == 3 && Route::getCurrentRoute()->getName() == "professorAcademicData"){
            if(!empty(Session::get('edict_id'))){
                return redirect()->route('process');
            }
            return redirect()->route('home');
        }

        return $next($request);
    }
}
