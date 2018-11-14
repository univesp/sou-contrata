<?php

namespace Contrata;

use Illuminate\Database\Eloquent\Model;

class AssignmentVacancy extends Model {
    
    protected $table = 'assignment_vacancies';

    protected $fillable = [
        'service_id','criteria_id'
    ];

    protected $sorted =  [
        'service_id','criteria_id'
    ];

    protected $hidden = [
        'service_id','criteria_id'
    ];
}
