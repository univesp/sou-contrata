<?php

namespace App\Http\Controllers;

use App\ApplicationAssignment;
use Illuminate\Http\Request;
use App\Application;
use App\ApplicationCriterion;
use Illuminate\Support\Facades\Session;
use App\Candidate;
use App\Vacancy;

class CriterionController extends Controller
{
    //
    public function store(Request $request)
    {
        $candidate_id = Candidate::where('user_id','=', $request->session()->get('user')['id'])->first()->id;

        if(empty($request['criteria']) || empty($request['sevices'])){
            Session::put('resp','Criterios e serviços precisam ser preenchidos, por favor volte a vaga desejada e marque ao menos uma opção de cada. VOCÊ AINDA NÃO ESTÁ CONCORRENDO A VAGA! ');
            return redirect()->route('process');
        }

        $ap = new Application();
        $ap->candidate_id                 = $candidate_id;
        $ap->vacancy_id          = $request['vacancy_id'];
        $ap->status_2              = 'ok';
        $ap->obs               = "Gravando em banco!";

        $application = $ap->save();



        if($application) {
            foreach ($request['criteria'] as $criteria){

                $ac = new ApplicationCriterion();
                $ac->application_id                 = $ap->id;
                $ac->vacancy_criteria_id          = $criteria;
                $ac->criterion_types_id           = $request['type_'.$criteria];
                $ac->flag_ok               = 1;

                $a_criteroin = $ac->save();
            }
            foreach ($request['sevices'] as $service){

                $aa = new ApplicationAssignment();
                $aa->application_id                 = $ap->id;
                $aa->service_id          = $service;
                $aa->flag_ok               = 1;

                $a_assigment = $aa->save();
            }

        }

        $vacancy = Vacancy::where('id','=', $request['vacancy_id'])->first()->title;
        $resp = "Parabens! Agora você está concorrendo a vaga {$vacancy}. Lembrando que você pode concorrer a quantas vagas quiser.";
        Session::put('resp',$resp);
        return redirect()->route('process');
    }
}
