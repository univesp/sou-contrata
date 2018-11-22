<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\AssignmentVacancy;

class CriterionController extends Controller
{
    //
    public function store(Request $request)
    {
        $ap = new Application();
        $ap->candidate_id                 = 1;
        $ap->criterion_id          = date('Y-m-d', strtotime($request->date_birth));
        $ap->status               = 'ok';
        $ap->observation               = "Gravando em banco!";

       $ap = ApplicationAssignment::save();
    }
}

/*
"sevices" => array:5 [▼
        0 => "2"
        1 => "5"
        2 => "7"
        3 => "8"
        4 => "10"
      ]
      "vacancy_id" => "1"
      "vc1" => "1"
      "criteria1" => "1"
      "vc3" => "3"
      "criteria9" => "9"
      "vc2" => "2"
      "criteria5" => "5"*/
