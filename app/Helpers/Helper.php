<?php

namespace App\Helpers;

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
}



