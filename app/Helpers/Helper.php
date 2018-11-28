<?php

namespace App\Helpers;
use App\Candidate;
use App\Scholarity;
use App\Document;

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
    static function alterSession($request, $permission)
    {
        $user = $request->session()->get('user');
        $user['permission'] = $permission;
        $request->session()->flush();
        $request->session()->put('user', $user);
    }

    static function createSession($user_object, $request)
    {
        $request->session()->flush();

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
}



