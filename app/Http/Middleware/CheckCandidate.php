<?php

namespace App\Http\Middleware;

use Closure;
use App\Candidate;

class CheckCandidate
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
        /*$user = $request->session()->get('user');
        $candidate = Candidate::where('user_id','=',$user)->first();

        if (!empty($candidate['user_id'])){
            return redirect('/process');
        }*/

        return $next($request);
    }
}
