<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholarity;
use Illuminate\Support\Carbon;
use App\Helpers\functions;
use App\Vacancy;

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

        $id = $request->session()->get('candidate');

        // Documentos de Graduação do Candidato

        $path_file_graduate = $request['file_graduate']->store("documents-graduate/{$id}");

        // Documentos de Mestrado do Candidato
        
        $path_file_master = $request['file_master']->store("documents-master/{$id}");
        
        // Documentos de Doutorado do Candidato

        $path_file_doctorate = $request['file_doctorate']->store("documents-doctorate/{$id}");

        $scholarity = [
            [
                'class_name' => $request->cadlettters,
                'end_date' => $this->br_to_bank($request->inputDataConclusao),
                'init_date' => $this->br_to_bank($request->inputDataConclusao),
                'link' => $path_file_graduate,
                'scholarity_type' => $request->inputCursos,
                'teaching_institution' => $request->inpuInstituicao,
                'candidate_id' => $id 
            ],[
                'class_name' => $request->cadlettters,
                'end_date' =>  $this->br_to_bank($request->inputAnoConclusao_1),
                'init_date' => $this->br_to_bank($request->inputAnoConclusao_1),
                'link' => $path_file_master,
                'scholarity_type' => $request->inputArea,
                'teaching_institution' => $request->inputInstiucao_1,
                'candidate_id' => $id
            ],[
                'class_name' => $request->cadlettters,
                'end_date' =>  $this->br_to_bank($request->inputAnoConclusao_2),
                'init_date' => $this->br_to_bank($request->inputAnoConclusao_2),
                'link' => $path_file_doctorate,
                'scholarity_type' => $request->inputCursos_2,
                'teaching_institution' => $request->inputInstiucao_2,
                'candidate_id' => $id
            ]

        ];

        foreach ($scholarity as $school) {
            $result[] = Scholarity::create($school);  
        }

        $data = Vacancy::all()->where('edict_id', 1);
        $resp = $result;

        return view('vacancy.process', compact(['resp', 'data']));
    }

    public function br_to_bank($now)
    {
        $data = explode('/', $now);
        $dt = date('Y-m-d', strtotime($now));

        return $dt;
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
        
       

    }
}
