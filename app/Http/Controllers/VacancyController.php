<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Vacancy;

class VacancyController extends Controller
{
    public function process()
    {

        $edict = Session::get('edict_id');
        $data = Vacancy::with('edict')
            ->with('applications')
            ->where('edict_id', $edict)
            ->orderBy('created_at','desc')
            //->paginate(12);
            ->paginate(12);

        return view('vacancy.process', compact('data'));
    }
}
