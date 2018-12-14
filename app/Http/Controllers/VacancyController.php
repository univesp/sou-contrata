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

        $bind = Vacancy::with('edict')
            ->with('applications')
            ->where('edict_id', $edict)
            ->orderBy('created_at','desc')
            ->get();

        $data = $this->applicationsModels($bind, $candidate_id);
        return view('vacancy.process', compact('data','candidate_id'));
    }

    private function applicationsModels($data, $candidate_id)
    {
        foreach ($data as  $key=>$applications){
            foreach ($applications->applications as $k => $application) {
                if ($application->candidate_id != $candidate_id) {
                    unset($data[$key]->applications[$k]);
                }
            }
        }
        return $data;
    }
}
