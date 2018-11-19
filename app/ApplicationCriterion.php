<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationCriterion extends Model
{
    // Protect table name
    protected $table = 'application_criteria';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    // Protect table fields
    protected $fillable = [
        'flag_ok',
        'candidate_id',
        'vacancy_crit_id',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'flag_ok',
        'candidate_id',
        'vacancy_crit_id',
    ];

    // Relationships
    public function vacancyCriterion()
    {
        return $this->belongsTo(VacancyCriterion::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
