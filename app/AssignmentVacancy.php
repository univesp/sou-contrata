<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentVacancy extends Model {
    
    protected $table = 'assignment_vacancies';

    protected $fillable = [
        'service_id','criterion_id'
    ];

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $sorted =  [
        'service_id','criterion_id'
    ];

    protected $hidden = [
        'service_id','criterion_id'
    ];
}
