<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Document;
use App\Address;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Response;
use Session;
use Auth;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professor.personal-data');
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
        $path_file_address = $request['file_address']->store("documents-address/{$user_id}");
        $path_file_cpf = $request['file_cpf']->store("documents-cpf/{$user_id}");
        $path_file_rg = $request['file_rg']->store("documents-rg/{$user_id}");
        $path_file_military = '';
        $path_file_title = ''; 

        // Validate if file military exist
        if (empty($request['file_military'])) {
            $path_file_military = 'Empty';
        } else {
            $path_file_military = $request['file_military']->store("documents-military/{$user_id}");
        }

        // Validate if file tittle exist
        if (empty($request['file_title'])) {
            $path_file_title = 'Empty';
        } else {
            $path_file_title = $request['file_title']->store("documents-title/{$user_id}");
        }

        // Validate all fields
        $validator = Validator::make($request->input(), [
            // Candidate validations
            'cpf'               => 'required',
            // 'file_cpf'                => 'required',
            'date_birth'        => 'required',
            'last_name'         => 'required',
            'name'              => 'required',
            'name_mother'       => 'required',
            'marital_status'    => 'required',
            'nationality'       => 'required',
            'phone'             => 'required',

            // Documents validations
            'elector_title'             => 'required',
            // 'file_title'                => 'required',
            'rg_number'                 => 'required',
            // 'file_rg'                   => 'required',
            'date_issue'                => 'required',
            'uf_issue'                  => 'required',

            // Address validations
            'city'                      => 'required',
            // 'file_address'              => 'required',
            'neighborhood'              => 'required',
            'number'                    => 'required',
            'postal_code'               => 'required',
            'public_place'              => 'required',
            'state'                     => 'required',
            'type_public_place'         => 'required',
        ]);

        // Validate if the rules are met
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
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
            $candidate->obs_deficient       = isset($request->obs_deficient)? $request->obs_deficient: 'Empty';
            $candidate->flag_deficient      = ($request->obs_deficient) ? 1 : 0 ;
            $candidate->phone               = trim($request->phone);
            $candidate->user_id             = $user_id;

            // Save in database
            if ($candidate->save()) {
                // Put candidate session variable
                $request->session()->put('candidate', $candidate->id);

                // Create new document
                $document = new Document();
                $document->elector_title            = isset($request->elector_title)? $request->elector_title : 'Empty' ;
                $document->elector_link             = $path_file_title;
                $document->military_certificate     = isset($request->military_certificate)? $request->military_certificate : 'Empty' ;
                $document->military_link            = $path_file_military;
                $document->number                   = $request->number;
                $document->number_link              = $path_file_rg;
                $document->date_issue               = date('Y-m-d', strtotime($request->date_issue));
                $document->uf_issue                 = $request->uf_issue;
                $document->zone                     = 'Empty';
                $document->section                  = 'Empty';
                $document->candidate_id             = $candidate->id;

                // Save in database
                $document->save();
            }

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

            // Save in database
            $address->save();

            // Return in view
            // return response()->json('funciona');
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
}
