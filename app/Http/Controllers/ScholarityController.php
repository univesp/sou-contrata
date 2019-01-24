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
use Illuminate\Support\Facades\Input;

class ScholarityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professor.academic-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->session()->get('user')['id'];
        $edict_id = $request->session()->get('edict_id');
        $candidate_id = Candidate::where('user_id', '=', $user_id)->first()->id;

        $validator = Validator::make($request->all(), [
            'file_graduate.*' => 'required|file|max:4000|mimes:pdf',
            'inputCursos.*' => 'required',
            'inpuInstituicao.*' => 'required',
            'cadlettters' => 'required',
            'area_id.*' => 'required',
            'subarea_id.*' => 'required',
            'graduate_dinamic.*' => 'required',
            'inputCursos.*' => 'required',
            'inpuInstituicao.*' => 'required',
            'inputDataConclusao.*' => 'required',
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
        $scholarity_type = ['graduate','master','doctorate'];

        if(count($request->graduate_dinamic) >= 3) {

            foreach ($request['graduate_dinamic'] as $k => $d) {
                $school = new Scholarity();
                // Função responsável para mover os documentos Acadêmicos.
                if ($request->hasFile('file_graduate.'.$k) && $request->file('file_graduate.'.$k)->isValid()) {
                    $file = Input::file('file_graduate.'.$k);
                    $fileMimeType = Input::file('file_graduate.'.$k)->getMimeType();
                    $fileData = file_get_contents($file);
                    $base64 = base64_encode($fileData);
                    $path_file = "data:{$fileMimeType};base64,{$base64}";
                }
                // $path_file = Helper::uploads_documents_academic($request, $k, $d, $candidate_id);

                $school->class_name = $request->cadlettters;
                $school->end_date  = Helper::br_to_bank($request->inputDataConclusao[$k]);
                $school->init_date = Helper::br_to_bank($request->inputDataConclusao[$k]);
                $school->link = $path_file;
                $school->scholarity_type = $scholarity_type[$d-1];
                $school->teaching_institution = $request->inpuInstituicao[$k];
                $school->candidate_id = $candidate_id;
                $school->area_id = $request->area_id[$k];
                $school->course_name = $request->inputCursos[$k];

                if($school->save()) {

                    $areaScholarity = new ScholarityArea();
                    $areaScholarity->scholarity_id = $school->id;
                    $areaScholarity->area_id = $request->area_id[$k];
                    $areaScholarity->subarea_id = $request->subarea_id[$k];
                    $areaScholarity->save();
                }
            }

        } else {
            return redirect()->route('professorAcademicData');
        }

        $resp = "Parabéns, o seu cadastro está completo e servirá para que você possa se credenciar à todas as disciplinas disponíveis. Agora escolha uma disciplina para se credenciar.";
        $bind = Vacancy::with('edict')
            ->with('applications')
            ->where('edict_id', $edict_id)
            ->orderBy('created_at','desc')
            ->paginate(12);
        $data = $this->applicationsModels($bind, $candidate_id);
        Helper::alterSessionUser($request, 3);
        return view('vacancy.process', compact('resp','data', 'candidate_id'));
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

    public function area() {
        // Create area list to select box
        $area = Area::orderBy('description', 'asc')->select('description', 'id')->get();
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
            ->orderBy('subareas.description', 'asc')
            ->select('subareas.description', 'subareas.id')->get();
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
        $dados = Scholarity::all();
        return response()->json($dados);
    }

    // Rotina via JSON

    public function scholarityJSON($id)
    {

        $dados = Scholarity::where('id', '=', $id)->first();


        return response()->json($dados);
    }

}
