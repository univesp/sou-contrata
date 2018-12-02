<?php

namespace App\Helpers;
use App\Candidate;
use App\Scholarity;
use App\Document;
use Illuminate\Support\Facades\Session;

class Helper
{
    static function formatDateAndTime($value, $format = 'd/m/Y')
    {
        // Utiliza a classe de Carbon para converter ao formato de data ou hora desejado
        return Carbon\Carbon::parse($value)->format($format);
    }

    static function formatText($value, $type = 'upper')
    {
        switch($type) {
            case 'upper':
                $text = strtoupper($value);
            break;
            case 'lower':
                $text = strtolower($value);
            break;
            case 'first upper':
                $text = ucfirst($value);
            break;
            default :
                $text = '###';
        }
        return $text;
    }
    static function alterSessionUser($request, $permission)
    {
        $user = $request->session()->get('user');
        $user['permission'] = $permission;
        $request->session()->flush();
        $request->session()->put('user', $user);
    }

    static function createSessionUser($user_object, $request)
    {
        $request->session()->forget('user_id');
        $candidate = Candidate::where('user_id', $user_object->id)->first();
        if(!empty($candidate->id)){
            $scholarities_candidate = Scholarity::where('candidate_id', $candidate->id)->first();
        }
        $page = 0;
        if(!empty($candidate->id)) {
            $page = 2;
            if(!empty($scholarities_candidate->id)) {
                $page = 3;
            }
        } else {
            $page = 1;
        }

        $userSession = [
            'id' => $user_object->id,
            'user' => $user_object->name,
            'email' => $user_object->email,
            'permission' => $page,
        ];
        $request->session()->put('user', $userSession);
    }

    static function createSessionEdict($request, $id)
    {
        Session::forget('edict_id');
        Session::put('edict_id', $id);
    }

    static function br_to_bank($now)
    {
        $data = explode('/', $now);
        $dt = date('Y-m-d', strtotime($now));

        return $dt;
    }

    static function uploads_documents_academic($request, $idx, $tipo, $id)
    {
        switch ($tipo) {

            case '1':
                // se for 1 é Graduação
                // Documentos de Graduação do Candidato

                $path_file = $request['file_graduate'][$idx]->store("documents-graduate/{$id}");
                break;
            case '2':
                // se for 2 é Mestrado
                // Documentos de Mestrado do Candidato
                $path_file = $request['file_graduate'][$idx]->store("documents-master/{$id}");
                break;
            case '3':
                // se for 3 é Doutorado
                // Documentos de Doutorado do Candidato
                $path_file = $request['file_graduate'][$idx]->store("documents-doctorate/{$id}");
                break;
        }

        return $path_file;
    }
}



