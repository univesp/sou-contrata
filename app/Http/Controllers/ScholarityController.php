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

        $sessao = $request->session()->get('candidate');

        // Documentos de Graduação do Candidato
        $path_file_graduate = $request['file_graduate']->store("documents-graduate/{$sessao[0]->id}");

        // Documentos de Mestrado do Candidato
        $path_file_master = $request['file_master']->store("documents-graduate/{$sessao[0]->id}");
        
        // Documentos de Doutorado do Candidato
        $path_file_doctorate = $request['file_doctorate']->store("documents-graduate/{$sessao[0]->id}");

        $scholarity = [
            [
                'class_name' => $request->cadlettters,
                'end_date' => Carbon::parse($request->inputDataConclusao)->format('Y-m-d'),
                'init_date' => Carbon::parse($request->inputDataConclusao)->format('Y-m-d'),
                'link' => $path_file_graduate,
                'scholarity_type' => $request->inputCursos,
                'teaching_institution' => $request->inpuInstituicao,
                'candidate_id' => $sessao[0]->id 
            ],[
                'class_name' => $request->cadlettters,
                'end_date' => Carbon::parse($request->inputDataConclusao_1)->format('Y-m-d'),
                'init_date' => Carbon::parse($request->inputDataConclusao)->format('Y-m-d'),
                'link' => $path_file_master,
                'scholarity_type' => $request->inputArea,
                'teaching_institution' => $request->inputInstiucao_1,
                'candidate_id' => $sessao[0]->id
            ],[
                'class_name' => $request->cadlettters,
                'end_date' => Carbon::parse($request->inputDataConclusao_2)->format('Y-m-d'),
                'init_date' => Carbon::parse($request->inputDataConclusao)->format('Y-m-d'),
                'link' => $path_file_doctorate,
                'scholarity_type' => $request->inputCursos_2,
                'teaching_institution' => $request->inputInstiucao_2,
                'candidate_id' => $sessao[0]->id
            ]

        ];

        foreach ($scholarity as $school) {

            $result[] = Scholarity::create($school);  
        }

        //dd($result);

        return view('vacancy/process');
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

    public function document_academic(Request $request) {
        
        //$session = $request->session()->get('candidate');
        //$user = $session[0]->id;

        $input = $request->all();
        $input['image'] = $input['file_graduate'];

        // Pegando a extensão do arquivo

        $arr = explode('.', $input['image']);
        $extensao = end($arr);

        $input['image'] = time() . '.' . $extensao;
        //$request->image->move(public_path("documents-academic/{$user}/"), $input['image']);
        
        dd($request);

    }
}
