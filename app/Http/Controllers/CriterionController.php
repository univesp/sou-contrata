<?php

namespace App\Http\Controllers;

use App\ApplicationAssignment;
use Illuminate\Http\Request;
use App\Application;
use App\ApplicationCriterion;
use App\AssignmentVacancy;
use App\Candidate;

class CriterionController extends Controller
{
    //
    public function store(Request $request)
    {

        //$id_candidete = $request->session()->get('candidate');
        $ap = new Application();
        $ap->candidate_id                 = 1;
        $ap->vacancy_id          = $request['vacancy_id'];
        $ap->status               = 'ok';
        $ap->observation               = "Gravando em banco!";

        $application = $ap->save();

        $resp[] = "Application cadastrado ID -" . $ap->id;

        if($application)
        {
            foreach ($request['criteria'] as $criteria){

                $ac = new ApplicationCriterion();
                $ac->candidate_id                 = $ap->id;
                $ac->vacancy_crit_id          = $criteria;
                $ac->flag_ok               = 1;

                $a_criteroin = $ac->save();

                $resp[] = "ApplicationCriterion cadastrado ID - {$ap->id} | Criterio ID {$criteria} | ID - {$ac->id}";
            }
            foreach ($request['sevices'] as $service){

                $aa = new ApplicationAssignment();
                $aa->application_id                 = $ap->id;
                $aa->service_id          = $service;
                $aa->flag_ok               = 1;

                $a_assigment = $aa->save();

                $resp[] = "ApplicationCriterion cadastrado ID - {$ap->id} | Service ID {$service} | ID - {$aa->id}";
            }

        }
        return $resp;
    }
}
