<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholarity;
use Illuminate\Support\Carbon;

class ScholarityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($_POST);

        $scholarity = [
            [
                'class_name' => $request->cadlettters,
                'end_date' => Carbon::parse($request->inputDataConclusao)->format('Y-m-d'),
                'init_date' => Carbon::parse($request->inputDataConclusao)->format('Y-m-d'),
                'link' => 'empty',
                'scholarity_type' => $request->inputCursos,
                'teaching_institution' => $request->inpuInstituicao,
                'candidate_id' => 1 
            ],[
                'class_name' => $request->cadlettters,
                'end_date' => Carbon::parse($request->inputDataConclusao_1)->format('Y-m-d'),
                'init_date' => Carbon::parse($request->inputDataConclusao)->format('Y-m-d'),
                'link' => 'empty',
                'scholarity_type' => $request->inputArea,
                'teaching_institution' => $request->inputInstiucao_1,
                'candidate_id' => 1
            ],[
                'class_name' => $request->cadlettters,
                'end_date' => Carbon::parse($request->inputDataConclusao_2)->format('Y-m-d'),
                'init_date' => Carbon::parse($request->inputDataConclusao)->format('Y-m-d'),
                'link' => 'empty',
                'scholarity_type' => $request->inputCursos_2,
                'teaching_institution' => $request->inputInstiucao_2,
                'candidate_id' => 1
            ]

        ];

        foreach ($scholarity as $school) {

            $result[] = Scholarity::create($school);  
        }

        //$result = Scholarity::create($request->all());

        dd($result);
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
