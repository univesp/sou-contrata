<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Scholarity;
use App\Vacancy;
use App\Criterion;
use App\VacancyCriterion;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {
        $data = Vacancy::with('vacancy_criteria')->with('services')->find($id);
        $vacancies = Criterion::with('vacancy_criteria')
            ->whereHas('vacancy_criteria',function ($query) use (&$id){
                $query->where('vacancy_id', '=', $id);
            })->get();

        $result = [];
        foreach ($vacancies as $vacancy){
            $type = $this->montarCriterionType($vacancy->id);
            if($type != false){
                $result[$vacancy->title][$vacancy->id] = [
                    "id" => $vacancy->id,
                    "title_id" => $vacancy->title_id,
                    "name" => $vacancy->name,
                    "created_at" => $vacancy->id,
                    "updated_at" => $vacancy->updated_at,
                    "type" => $type,
                ];
            }
        }
        return view('professor.position', compact(['data','result', 'id']));

    }

    private function montarCriterionType($id)
    {
        $criterion_types = Criterion::with('criterion_types')
            ->where('id','=',$id)
            ->get();
        $result = [];
        foreach ($criterion_types as $criterion){
            foreach ($criterion->criterion_types as $c){
                if(!empty($c)){
                    $result[$c->id] = [
                        "id" => $c->id,
                        "description" => $c->description,
                    ];
                }else{
                    return false;
                }

            }
        }
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
