<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function process()
    {   
        //$data = \App\Vacancy::all();
        $data = array();
        return view('vacancy.process', compact('data'));
    }
}
