<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Candidate as Candidate;
use App\Document;
use App\Scholarity;
use App\Address;
use App\User;
use App\Area;
use App\Helpers\Helper;
use App\ScholarityArea;
use DB;

class UserController extends Controller
{
    public function editPassword($id)
    {
        // Find user by id
        $user = User::where('id', $id)->first();
    
        if (!empty($user->id)) {

            // Return this view
            return view("admin.user.password.edit")
                ->with('user', $user)
                ->with('id', $id);
        } else {
            // Return this view
            return redirect()->route("home");
        }
    }

    public function updatePassword($id, Request $request)
    {
        // Find by user id
        $user = User::find($id);
        
        // Validate all fields
        $validator = Validator::make($request->all(), [
            // Candidate validations
            'old_password'      => 'required',
            'password'          => 'required|same:password_confirm',
        ]);

        // Validate if the rules are met
        if ($validator->fails()) {
            // Return json with errors
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            
            // Request all fields
            $input = $request->all();

            // Validation if the old password is equal to the one in the database
            if(Hash::check($request->old_password, $user->password)) {                
                
                // Condition if password field is empty
                if(!empty($input['password'])){ 
                    $input['password'] = Hash::make($input['password']);
                }

                // Update password
                $user->update($input);

                // Return response value to script
                return response()->json([$user, 'success'=>'Senha atualizada com sucesso!']);
            }
        }
    }

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
            return redirect()->route("home");
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
            'elector_title'             => ($request->nationality == 0) ? 'required|unique:documents,elector_title,' . $document->id : '',
            'file_title'                => ($request->nationality == 0 && !empty($path_file_title)) ? 'required|image' : 'image',
            'military_certificate'      => ($request->genre == 0 && $request->nationality == 0) ? 'required|unique:documents,military_certificate,'.$document->id : '',
            'file_military'             => ($request->genre == 0 && $request->nationality == 0  && !empty($path_file_military)) ? 'required|image' : 'image',
            'date_issue'                => 'required',
            'uf_issue'                  => 'required',

            // Address validations
            'city'                      => 'required',
            'file_address'              => (!empty($path_file_address)) ? 'required|image' : 'image',
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
                ->route('admin/personal-data/edit', $id)
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
                $document->elector_title            = isset($request->elector_title)? $request->elector_title : NULL;
                $document->military_certificate     = isset($request->military_certificate)? $request->military_certificate : NULL;
                $document->date_issue               = date('Y-m-d', strtotime($request->date_issue));
                $document->uf_issue                 = $request->uf_issue;
                $document->rg_number                = $request->rg_number;
                $document->zone                     = 'Empty';
                $document->section                  = 'Empty';
                if($path_file_title) { $document->elector_link = $path_file_title; }
                if($path_file_military) { $document->military_link = $path_file_military; }

                // Update in database
                $document->save();

                // Update address
                $address->city                      = $request->city;
                $address->complement                = $request->complement;
                $address->neighborhood              = $request->neighborhood;
                $address->number                    = $request->number;
                $address->postal_code               = $request->postal_code;
                $address->public_place              = $request->public_place;
                $address->state                     = $request->state;
                $address->type_public_place         = $request->type_public_place;
                if($path_file_address) {$address->file_address = $path_file_address; }

                // Update in database
                $address->save();
            }

            // Return in view
            return redirect()->route('home');
        }
    }

    public function editAcademicData($id)
    {
        // Find candidate by id
        $candidate = Candidate::where("user_id",$id)->first();

        // Find scholarity by candidate id
        $scholarity = Scholarity::with('area')
            ->with('scholarityAreas')
            ->where('candidate_id', $candidate->id)->get();

        $cont = 0;
        foreach ($scholarity as $scholl){
            $scholarity[$cont]->subarea = DB::table('subareas')
                ->leftJoin('scholarity_area', 'subareas.id', '=', 'scholarity_area.subarea_id')
                ->select('subareas.id', 'subareas.description')
                ->where('scholarity_area.scholarity_id', $scholl->scholarityAreas[0]->scholarity_id)
                ->orderBy('subareas.description', 'asc')->get();
            $cont++;
        }

        // Condition if candidate id is empty
        if (!empty($scholarity[0]->candidate_id)) {

            // Array to select save in database
            $scholarity_type = ['graduate','master','doctorate'];

            // Return this view
            return view("admin.user.academic-data.edit")
                ->with('candidate', $candidate)
                ->with('scholarity', $scholarity)
                ->with('scholarity_type', $scholarity_type)
                ->with('id', $id)
            ;
        } else {
            // Return this view
            return redirect()->route("home");
        }
    }

    public function storeAcademicData(Request $request)
    {
    }

    public function updateAcademicData($id, Request $request)
    {
        // Validate all fields
        $validator = Validator::make($request->all(), [
            'file_graduate.*' => !empty($path_file) ? 'required|file|max:4000|mimes:pdf' : 'file|max:4000|mimes:pdf',
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

        // Validate if the rules are met
        if ($validator->fails()) {
            return redirect()
            ->route('admin/academic-data/edit', $id)
            ->withInput($request->all())
            ->withErrors($validator->messages([
                'file_graduate.*.size' => 'O tamanho do Arquivo é muito grande (:size), o tamanho permitido no máximo é de 4 MegaByte (Mb).',
                "file_graduate.*.accepted" => "O tipo de arquivo :accepted não é aceito apenas PDF.",
                ]))
            ;
        }

        $path_file = null;
        $scholarity_type = ['graduate','master','doctorate'];

        // Validate if graduate dinamic has more than three
        if(count($request->graduate_dinamic) >= 3) {
            // Declarate empty array
            $areaScholarityArray = array();
            $scholarityArray = array();

            foreach ($request['graduate_dinamic'] as $k => $d) {
                $candidate = Candidate::where('user_id', $id)->first();
                $scholarityId = Scholarity::where('candidate_id', $candidate->id)->get();

                // Construct the array to call values correctly
                array_push ($scholarityArray, $scholarityId);
                $scholarity[] = Scholarity::distinct()->whereIn('id', [$scholarityId[$k]->id])->first();

                array_push ($areaScholarityArray, $scholarityId[$k]->id);
                $areaScholarity[] = ScholarityArea::distinct()->whereIn('scholarity_id', [$areaScholarityArray[$k]])->first();
            }

            for ($i=0; $i < count($scholarity); $i++) {
                // Validate if file graduate exist
                if ($request->hasFile('file_graduate.'.$i) && $request->file('file_graduate.'.$i)->isValid()) {
                    $file = Input::file('file_graduate.'.$i);
                    $fileMimeType = Input::file('file_graduate.'.$i)->getMimeType();
                    $fileData = file_get_contents($file);
                    $base64 = base64_encode($fileData);
                    $path_file = "data:{$fileMimeType};base64,{$base64}";
                }

                // Update scholarity
                $scholarity[$i]->class_name = $request->cadlettters;
                $scholarity[$i]->course_name = $request->inputCursos[$i];
                $scholarity[$i]->end_date  = Helper::br_to_bank($request->inputDataConclusao[$i]);
                $scholarity[$i]->init_date = Helper::br_to_bank($request->inputDataConclusao[$i]);
                if($path_file) { $scholarity[$i]->link = $path_file; }
                $scholarity[$i]->scholarity_type = $scholarity_type[$i];
                $scholarity[$i]->teaching_institution = $request->inpuInstituicao[$i];
                $scholarity[$i]->area_id = $request->area_id[$i];
                $scholarity[$i]->course_name = $request->inputCursos[$i];

                // Update in database
                if($scholarity[$i]->save()) {
                    for ($as=0; $as < count($areaScholarity); $as++) {
                        // Update area scholarity
                        $areaScholarity[$as]->area_id = $request->area_id[$as];
                        $areaScholarity[$as]->subarea_id = $request->subarea_id[$as];

                        // Update in database
                        $areaScholarity[$as]->save();
                    }
                }
            }

            // Return this view
            return redirect()->route('home');
        } else {

            // Return this view
            return redirect()->route('admin/academic-data/edit', $id);
        }
    }

    public function area() 
    {
        // Create area list to select box
        $area = Area::orderBy('description', 'asc')->select('description', 'id')->get();

        // Return area
        echo json_encode($area);
    }

    public function subarea($area) 
    {
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
}
