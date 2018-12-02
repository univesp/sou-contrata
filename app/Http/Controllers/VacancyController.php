<?php

namespace App\Http\Controllers;

use App\Application;
use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Vacancy;

class VacancyController extends Controller
{
    public function process()
    {

        $edict = Session::get('edict_id');
        $user_id = Session::get('user')['id'];
        $candidate_id = Candidate::where('user_id','=',$user_id)->first()->id;

        $data = Vacancy::with('edict')
            ->with('applications')
            ->where('edict_id', $edict)
            ->orderBy('created_at','desc')
            //->paginate(12);
            ->paginate(12);
        return view('vacancy.process', compact('data','candidate_id'));
    }
}
