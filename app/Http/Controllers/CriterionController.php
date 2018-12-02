<?php

namespace App\Http\Controllers;

use App\ApplicationAssignment;
use Illuminate\Http\Request;
use App\Application;
use App\ApplicationCriterion;
use App\AssignmentVacancy;
use App\Candidate;
use App\Vacancy;

class CriterionController extends Controller
{
    //
    public function store(Request $request)
    {
        $candidate_id = Candidate::where('user_id','=', $request->session()->get('user')['id'])->first()->id;
        $id_edict = $request->session()->get('edict_id');

        $ap = new Application();
        $ap->candidate_id                 = $candidate_id;
        $ap->vacancy_id          = $request['vacancy_id'];
        $ap->status_2              = 'ok';
        $ap->obs               = "Gravando em banco!";

        $application = $ap->save();

        $resp = "Application cadastrado ID -" . $ap->id;

        if($application) {
            foreach ($request['criteria'] as $criteria){

                $ac = new ApplicationCriterion();
                $ac->application_id                 = $ap->id;
                $ac->vacancy_criteria_id          = $criteria;
                $ac->criterion_types_id           = $request['type_'.$criteria];
                $ac->flag_ok               = 1;

                $a_criteroin = $ac->save();

                $resp = "ApplicationCriterion cadastrado ID - {$ap->id} | Criterio ID {$criteria} | ID - {$ac->id}";
            }
            foreach ($request['sevices'] as $service){

                $aa = new ApplicationAssignment();
                $aa->application_id                 = $ap->id;
                $aa->service_id          = $service;
                $aa->flag_ok               = 1;

                $a_assigment = $aa->save();

                $resp = "ApplicationCriterion cadastrado ID - {$ap->id} | Service ID {$service} | ID - {$aa->id}";
            }

        }

        $data = Vacancy::with('edict')
            ->with('applications')
            ->where('edict_id', $id_edict)
            ->orderBy('created_at','desc')
            //->paginate(12);
            ->paginate(12);

        return view('vacancy.process', compact(['data', 'resp', 'candidate_id']));
    }
}
