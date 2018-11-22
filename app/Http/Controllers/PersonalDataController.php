<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Document;
use App\Address;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Response;

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
        // Validate all fields
        $validator = Validator::make($request->input(), [
            // Candidate validations
            'cpf'               => 'required',
            'date_birth'        => 'required',
            'last_name'         => 'required',
            'name'              => 'required',
            'name_mother'       => 'required',
            'marital_status'    => 'required',
            'nationality'       => 'required',

            // Documents validations
            'elector_title'             => 'required',
            // 'elector_link'              => 'required',
            'rg_number'                 => 'required',
            // 'number_link'               => 'required',
            'date_issue'                => 'required',
            'uf_issue'                  => 'required',
        
            // Address validations
            'city'                      => 'required',
            'complement'                => 'required',
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
            $candidate->phone               = 99 - 99999-9999;
            $candidate->user_id             = $request->session()->get('user')->id;
            
            // Save in database
            if ($candidate->save()) {
                // Create new document
                $document = new Document();
                $document->elector_title            = $request->elector_title;
                $document->elector_link             = __DIR__ . '/public/img/elector/arquivo.pdf';
                $document->military_certificate     = $request->military_certificate;
                $document->military_link            = __DIR__ . '/public/img/military/arquivo.pdf';
                $document->number                   = $request->number;
                $document->number_link              = __DIR__ . '/public/img/number/arquivo.pdf';
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
            $address->neighborhood              = $request->neighborhood;
            $address->number                    = $request->number;
            $address->postal_code               = $request->postal_code;
            $address->public_place              = $request->public_place;
            $address->state                     = $request->state;
            $address->type_public_place         = $request->type_public_place;

            // Save in database
            $address->save();
    
            // Return in view
            return response()->json($candidate, $document, $address);
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
