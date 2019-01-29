<?php

namespace App\Http\Controllers;

use App\Scholarity;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Candidate;
use App\Document;
use App\Address;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Redirect;
use Response;
use Session;
use Auth;
use PDF;
use Illuminate\Support\Facades\Storage;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Find user id
        $user_id = $request->session()->get('user')['id'];

        // Return to view with user id
        return view('professor.personal-data')
            ->with('user_id', $user_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get user session variable
        $user_id = $request->session()->get('user')['id'];

        // Send documents to storage
        $path_file_address = null;
        $path_file_cpf = null;
        $path_file_rg = null;
        $path_file_military = null;
        $path_file_title = null;

        // Validate if file address exist and if it's valid
        if ($request->hasFile('file_address') && $request->file('file_address')->isValid()) {
            $file = Input::file('file_address');
            $fileMimeType = Input::file('file_address')->getMimeType();
            $fileData = file_get_contents($file);
            $base64 = base64_encode($fileData);
            $path_file_address = "data:{$fileMimeType};base64,{$base64}";
        }

        // Validate if file cpf exist
        if ($request->hasFile('file_cpf') && $request->file('file_cpf')->isValid()) {
            $file = Input::file('file_cpf');
            $fileMimeType = Input::file('file_cpf')->getMimeType();
            $fileData = file_get_contents($file);
            $base64 = base64_encode($fileData);
            $path_file_cpf = "data:{$fileMimeType};base64,{$base64}";
        }

        // Validate if file RG exist
        if ($request->hasFile('file_rg') && $request->file('file_rg')->isValid()) {
            $file = Input::file('file_rg');
            $fileMimeType = Input::file('file_rg')->getMimeType();
            $fileData = file_get_contents($file);
            $base64 = base64_encode($fileData);
            $path_file_rg = "data:{$fileMimeType};base64,{$base64}";
        }

        // Validate if file military exist
        if ($request->hasFile('file_military') && $request->file('file_military')->isValid()) {
            $file = Input::file('file_military');
            $fileMimeType = Input::file('file_military')->getMimeType();
            $fileData = file_get_contents($file);
            $base64 = base64_encode($fileData);
            $path_file_military = "data:{$fileMimeType};base64,{$base64}";
        }

        // Validate if file title exist
        if ($request->hasFile('file_title') && $request->file('file_title')->isValid()) {
            $file = Input::file('file_title');
            $fileMimeType = Input::file('file_title')->getMimeType();
            $fileData = file_get_contents($file);
            $base64 = base64_encode($fileData);
            $path_file_title = "data:{$fileMimeType};base64,{$base64}";
        }

        // Validate all fields
        $validator = Validator::make($request->all(), [
            // Candidate validations
            'cpf'               => 'required|unique:candidates',
            'file_cpf'          => 'required',
            'date_birth'        => 'required',
            'last_name'         => 'required',
            'name'              => 'required',
            'name_mother'       => 'required',
            'marital_status'    => 'required',
            'nationality'       => 'required',
            'phone'             => 'required',
            'mobile'            => 'required',
            'user_id'           => 'unique:candidates',

            // Documents validations
            'elector_title'             => ($request->nationality == 0) ? 'required|unique:documents' : '',
            'file_title'                => ($request->nationality == 0) ? 'required' : '',
            'rg_number'                 => 'required|unique:documents',
            'file_rg'                   => 'required',
            'military_certificate'      => ($request->genre == 0 && $request->nationality == 0) ? 'required|unique:documents' : '',
            'file_military'             => ($request->genre == 0 && $request->nationality == 0) ? 'required' : '',
            'date_issue'                => 'required',
            'uf_issue'                  => 'required',

            // Address validations
            'city'                      => 'required',
            'file_address'              => 'required',
            'neighborhood'              => 'required',
            'number'                    => 'required',
            'postal_code'               => 'required',
            'public_place'              => 'required',
            'state'                     => 'required',
            'type_public_place'         => 'required',
        ]);

        // Validate if the rules are met
        if ($validator->fails()) {
            return redirect()
                ->route('professorPersonalData')
                ->withInput($request->input())
                ->withErrors($validator)
            ;
        } else {
            // Create new candidate
            $candidate = new Candidate();
            $candidate->cpf                 = $request->cpf;
            $candidate->file_cpf            = $path_file_cpf;
            $candidate->date_birth          = date('Y-m-d', strtotime($request->date_birth));
            $candidate->genre               = $request->genre;
            $candidate->last_name           = $request->last_name;
            $candidate->name                = $request->name;
            $candidate->name_father         = $request->name_father;
            $candidate->name_mother         = $request->name_mother;
            $candidate->name_social         = $request->name_social;
            $candidate->marital_status      = $request->marital_status;
            $candidate->nationality         = $request->nationality;
            $candidate->curriculum_link     = isset($request->curriculum_link)? $request->curriculum_link: 'Empty';
            $candidate->obs_deficient       = isset($request->obs_deficient)? $request->obs_deficient: NULL;
            $candidate->flag_deficient      = ($request->obs_deficient) ? 1 : 0 ;
            $candidate->phone               = trim($request->area_code_phone.' '.$request->phone);
            $candidate->mobile              = trim($request->area_code_mobile.' '.$request->mobile);
            $candidate->user_id             = $user_id;

            // Save in database
            if ($candidate->save()) {
                // Put candidate session variable
                $request->session()->put('candidate', $candidate->id);

                // Create new document
                $document = new Document();
                $document->elector_title            = isset($request->elector_title)? $request->elector_title : NULL;
                $document->elector_link             = $path_file_title;
                $document->military_certificate     = isset($request->military_certificate)? $request->military_certificate : NULL;
                $document->military_link            = $path_file_military;
                $document->number                   = $request->number;
                $document->number_link              = $path_file_rg;
                $document->date_issue               = date('Y-m-d', strtotime($request->date_issue));
                $document->uf_issue                 = $request->uf_issue;
                $document->rg_number                = $request->rg_number;
                $document->zone                     = 'Empty';
                $document->section                  = 'Empty';
                $document->candidate_id             = $candidate->id;

                // Save in database
                $document->save();

                // Create new address
                $address = new Address();
                $address->city                      = $request->city;
                $address->complement                = $request->complement;
                $address->file_address              = $path_file_address;
                $address->neighborhood              = $request->neighborhood;
                $address->number                    = $request->number;
                $address->postal_code               = $request->postal_code;
                $address->public_place              = $request->public_place;
                $address->state                     = $request->state;
                $address->type_public_place         = $request->type_public_place;
                $address->candidate_id              = $candidate->id;

                // Save in database
                $address->save();
            }

            // Return in view
            Helper::alterSessionUser($request, 2);
            return redirect()->route('professorAcademicData');
        }
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

    public function searchForTeacher($cpf)
    {

        if(!is_numeric($cpf)){
            return "Valor precisa ser numerico";
        }

        if(strlen($cpf) != 11){
            return "Valor precisa ser de 11 caracteres";
        }

        $data = Candidate::where('cpf','=',$cpf)
            ->select('name', 'last_name' , 'cpf', 'date_birth')
            ->get();
        return $data;
    }

    public function searchData()
    {
       /* $data = Candidate::with('scholarities')
            ->with('document')
            ->select('id','name', 'last_name' , 'cpf', 'date_birth')
            ->get();*/

        $data = Candidate::with(array('scholarities'=>function($query){
            $query->select('id','candidate_id');
        }))->with(array('document'=>function($query){
            $query->select('id','candidate_id');
        }))
            ->select('id','name', 'last_name' , 'cpf', 'date_birth')
            ->get();

        $candidates = $this->treatData($data);

        return view('professor/search-data', compact('candidates'));
    }

    private function treatData($data)
    {
        foreach ($data as $k => $d){
            if(!empty($d->scholarities[0])){
                $data[$k]->scholarities = true;
            }else{
                $data[$k]->scholarities = false;
            }
            if(!empty($d->document[0])){
                $data[$k]->document = true;
            }else{
                $data[$k]->document = false;
            }
            $d->cpf_form = $this->mask("###.###.###-##",$d->cpf);
        }
        return $data;
    }

    private function mask($mask,$str){

        $str = str_replace(" ","",$str);

        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }

        return $mask;

    }

    public function downloadPDF($cpf)
    {

       if(!is_numeric($cpf)){
            return "Valor precisa ser numerico";
        }

        if(strlen($cpf) != 11){
            return "Valor precisa ser de 11 caracteres";
        }
        $candidate = Candidate::where('cpf','=',$cpf)
            ->first();
        $user = User::where('id','=',$candidate->user_id)
            ->first();

        $scholarity = Scholarity::where('candidate_id','=',$candidate->id)
            ->with('area')
            ->get();

        $documents = Document::where('candidate_id','=',$candidate->id)
            ->first();

        $data = [
            'name' => $candidate->name,
            'last_name' => $candidate->name,
            'date_birth' => $candidate->date_birth,
            'email' => $candidate->email,
            'mobile' => $candidate->mobile,
            'cpf' => $candidate->cpf,
            'phone' => $candidate->phone,
            'name_mother' => $candidate->name_mother,
            'name_father' => $candidate->name_father,
            'name_social' => $candidate->name_social,
            'rg_number' => $documents->rg_number,
            'data_issue' => $documents->data_issue,
            'uf_issue' => $documents->uf_issue,
            'elector_title' => $documents->elector_title,
            'zone' => $documents->zone,
            'section' => $documents->section,
            'military_certificate' => $documents->military_certificate,

            'name_user' => $user->name,
            'email_user' => $user->email,

            'scholarities' => $scholarity,

            'military_link' => $documents->military_link,
            'elector_link' => $documents->elector_link,
            'number_link' => $documents->number_link,
            ];


        foreach ($scholarity as $scholl){
            $link = explode(";", $scholl->link);
            if($link[0] == 'data:application/pdf'){
                $link2 = explode(",", $scholl->link);
                Storage::disk('public')->put(DIRECTORY_SEPARATOR.'docs'.DIRECTORY_SEPARATOR.$cpf.DIRECTORY_SEPARATOR.$scholl->scholarity_type.'.pdf', base64_decode($link2[1]));;
                //Storage::download(DIRECTORY_SEPARATOR.'docs'.DIRECTORY_SEPARATOR.$cpf.DIRECTORY_SEPARATOR.$scholl->scholarity_type.'.pdf', $scholl->scholarity_type.'.pdf');
            }
        }
        // $unique = uniqid();
        // mkdir($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$unique, 0777, true);
        $pdf = PDF::loadView('download.makePDF', $data)->save(Storage::disk('public')->put(DIRECTORY_SEPARATOR.'docs'.DIRECTORY_SEPARATOR.$cpf.DIRECTORY_SEPARATOR.$cpf.'-data.pdf'));

        return array(
            asset('storage/docs/'.$cpf.'/'.$cpf.'-data.pdf'),
            asset('storage/docs/'.$cpf.'/graduate.pdf'),
            asset('storage/docs/'.$cpf.'/master.pdf'),
            asset('storage/docs/'.$cpf.'/doctorate.pdf')

            );
    }
}
