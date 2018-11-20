<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use Illuminate\Support\Facades\Validator;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professor.dados-pessoais');
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
         
        ]);
        
        // Validate if the rules are met
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            // Create new candidate
            $candidate = new Candidate();
            $candidate->name                = $request->name;
            $candidate->last_name           = $request->last_name;
            $candidate->date_birth          = date('Y-m-d', strtotime($request->date_birth));
            $candidate->genre               = $request->genre;
            $candidate->marital_status      = $request->marital_status;
            $candidate->cpf                 = $request->cpf;
            $candidate->flag_deficient      = ($request->flag_deficient)? 1 : 0;
            $candidate->obs_deficient       = $request->obs_deficient;
            $candidate->name_mather         = $request->name_mather;
            $candidate->name_father         = $request->name_father;
            $candidate->name_social         = $request->name_social;
            $candidate->nationality         = $request->nationality;
            $candidate->user_id             = $request->user_id;
            $candidate->save();

            // Return in view
            return response()->json($candidate);
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
