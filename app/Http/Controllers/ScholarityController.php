<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Scholarity;
use App\Vacancy;
use App\Area;
use App\Subarea;
use App\AreaSubarea;
use DB;
use Illuminate\Support\Facades\Validator;
use App\ScholarityArea;

class ScholarityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Scholarity::all();
        return view('professor.academic-data',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = $request->session()->get('user')['id'];
        $id_edict = $request->session()->get('edict_id');
        $id_candidate = Candidate::where('user_id', '=', $id_user)->first();

        $validator = Validator::make($request->all(), [
            'file_graduate.*' => 'required|file|max:4000|mimes:pdf',
        ]);

        if ($validator->fails()) { 
            
            return redirect()
                ->route('professorAcademicData')
                ->withInput($request->all())
                ->withErrors($validator->messages([
                    'file_graduate.*.size' => 'O tamanho do Arquivo é muito grande (:size), o tamanho permitido no máximo é de 4 MegaByte (Mb).',
                    "file_graduate.*.accepted" => "O tipo de arquivo :accepted não é aceito apenas PDF.", 
                ]));
        }

        $path_file = null;

        if(count($request->graduate_dinamic) >= 3) {

            foreach ($request['graduate_dinamic'] as $k => $d) {

                $school = new Scholarity();
                // Função responsável para mover os documentos Acadêmicos.
                $path_file = Helper::uploads_documents_academic($request, $k, $d, $id_candidate->id);
                
                $school->class_name = $request->cadlettters;
                $school->end_date  = Helper::br_to_bank($request->inputDataConclusao[$k]);
                $school->init_date = Helper::br_to_bank($request->inputDataConclusao[$k]);
                $school->link = $path_file;
                $school->scholarity_type = $request->inputCursos[$k];
                $school->teaching_institution = $request->inpuInstituicao[$k];
                $school->candidate_id = $id_candidate;
                $school->area_id = $request->area_id[$k];

                if($school->save()) {

                    $areaScholarity = new ScholarityArea();
                    $areaScholarity->scholarity_id = $school->id;
                    $areaScholarity->area_id = $request->area_id[$k];
                    //$areaScholarity->subarea_id = $request->subarea_id[$k];
                    
                    $areaScholarity->save();
                }
            }

        } else {
            return redirect()->route('professorAcademicData');
        }

        $resp = "Parabens, o seu cadastro está completa e vai servi para todas as vagas que você se candidatar. Agora escolha uma vaga para se candidatar.";
        $data = Vacancy::where('edict_id', $id_edict)->paginate(12);

        Helper::alterSessionUser($request, 3);
        return view('vacancy.process', compact(['resp','data']));

    }

    public function area() {
        // Create area list to select box
        $area = Area::pluck('description', 'id');

        // Return area
        echo json_encode($area);
    }

    public function subarea($area) {
        // Add area value
        $area = (int) $area;

        // Create query to list subarea
        $subareas = DB::table('subareas')
            ->leftJoin('area_subarea', 'subareas.id', '=', 'area_subarea.subarea_id')
            ->select('subareas.id', 'subareas.description')
            ->where('area_subarea.area_id', $area)
            ->pluck('subareas.description', 'subareas.id');

        // Return subareas value
        echo json_encode($subareas);
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
