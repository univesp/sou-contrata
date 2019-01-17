<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Candidate as Candidate;
use App\Document;
use App\Address;
use App\User;
use DB;

class UserController extends Controller
{
    public function editPersonalData($id)
    {
        // Find user by id
        $user = User::find($id);

        // Find candidate by user id
        $candidate = DB::table('candidates')->where('user_id', $user->id)->first();
      
        // Condition if user by candidate exists
        if (!empty($candidate->user_id)) {
            // Find document by candidate id
            $document = Document::where('candidate_id', $candidate->id)->first();

            // Find address by candidate id
            $address = Address::where('candidate_id', $candidate->id)->first();
         
            // Return this view
            return view("admin.user.personal-data.edit")
                ->with('address', $address)
                ->with('candidate', $candidate)
                ->with('document', $document)
                ->with('user', $user)
                ->with('id', $id)
            ;
        } else {
            // Return this view
            return redirect()->route("admin/admin-user");
        }      
    }

    public function updatePersonalData($id, $candidate_id, Request $request)
    {
        // Send documents to storage
        $path_file_address = null;
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
        
        // Find candidate, document & address by id
        $candidate = Candidate::where('user_id', $id)->first();
        $document = Document::where('candidate_id', $candidate_id)->first();
        $address = Address::where('candidate_id', $candidate_id)->first();
        
        // Validate all fields
        $validator = Validator::make($request->all(), [
            // Candidate validations
            'date_birth'        => 'required',
            'last_name'         => 'required',
            'name'              => 'required',
            'name_mother'       => 'required',
            'marital_status'    => 'required',
            'nationality'       => 'required',
            'phone'             => 'required',
            'mobile'            => 'required',
            
            // Documents validations
            'elector_title'             => ($request->nationality == 0) ? 'required|unique:documents,'.$document->elector_title : '',
            'file_title'                => ($request->nationality == 0 && !empty($path_file_title)) ? 'required' : '',
            'military_certificate'      => ($request->genre == 0 && $request->nationality == 0) ? 'required|unique:documents,'.$document->military_certificate : '',
            'file_military'             => ($request->genre == 0 && $request->nationality == 0  && !empty($path_file_military)) ? 'required' : '',
            'date_issue'                => 'required',
            'uf_issue'                  => 'required',
            
            // Address validations
            'city'                      => 'required',
            'file_address'              => (!empty($path_file_address)) ? 'required' : '',
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
            ->route('admin/personal-data/edit')
            ->withInput($request->input())
            ->withErrors($validator)
            ;
        } else {
            // Update candidate
            $candidate->date_birth          = date('Y-m-d', strtotime($request->date_birth));
            $candidate->genre               = $request->genre;
            $candidate->last_name           = $request->last_name;
            $candidate->name                = $request->name;
            $candidate->name_father         = $request->name_father;
            $candidate->name_mother         = $request->name_mother;
            $candidate->name_social         = $request->name_social;
            $candidate->marital_status      = $request->marital_status;
            $candidate->nationality         = $request->nationality;
            $candidate->curriculum_link     = isset($request->curriculum_link)? $request->curriculum_link: NULL;
            $candidate->obs_deficient       = isset($request->obs_deficient)? $request->obs_deficient: NULL;
            $candidate->flag_deficient      = ($request->obs_deficient) ? 1 : 0 ;
            $candidate->phone               = trim($request->area_code_phone.' '.$request->phone);
            $candidate->mobile              = trim($request->area_code_mobile.' '.$request->mobile);
            
            // Update in database
            if ($candidate->save()) {
                // Update document               
                $document->elector_title            = isset($request->elector_title)? $request->elector_title : NULL ;
                $document->elector_link             = $path_file_title;
                $document->military_certificate     = isset($request->military_certificate)? $request->military_certificate : NULL ;
                $document->military_link            = $path_file_military;
                $document->date_issue               = date('Y-m-d', strtotime($request->date_issue));
                $document->uf_issue                 = $request->uf_issue;
                $document->rg_number                = $request->rg_number;
                $document->zone                     = 'Empty';
                $document->section                  = 'Empty';

                // Update in database
                $document->save();

                // Update address                
                $address->city                      = $request->city;
                $address->complement                = $request->complement;
                $address->file_address              = $path_file_address;
                $address->neighborhood              = $request->neighborhood;
                $address->number                    = $request->number;
                $address->postal_code               = $request->postal_code;
                $address->public_place              = $request->public_place;
                $address->state                     = $request->state;
                $address->type_public_place         = $request->type_public_place;

                // Update in database
                $address->save();
            }

            // Return in view
            return redirect()->route('home');
        }
    }

    public function editAcademicData($id)
    {
        // Return this view
        return view("admin.user.academic-data.edit")
            ->with('id', $id);
    }

    public function updateAcademicData($id, Request $request)
    {
        //
    }
}
