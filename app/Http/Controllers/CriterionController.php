<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\AssignmentVacancy;
use App\Candidate;

class CriterionController extends Controller
{
    //
    public function store(Request $request)
    {
        //$id_user = $request->session()->get('candidate');
        $ap = new Application();
        $ap->candidate_id                 = 1;
        $ap->vacancy_id          = $request['vacancy_id'];
        $ap->status               = 'ok';
        $ap->observation               = "Gravando em banco!";

        $application = $ap->save();

        $vacancy_id = $request->vacancy_id;
        $vc = $_POST['vc'];
        $services = $_POST['sevices'];

        unset($_POST['vc']);
        unset($_POST['vacancy_id']);
        unset($_POST['sevices']);
        unset($_POST['_token']);

        $arr = $_POST;
        
        foreach ($arr as $key => $val) {
            $criteria[$vacancy_id][] = $val;
        }
        
        // ######################### O velho ainda funciona salve $_POST !!!! #########################
        
        dd($criteria);


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
