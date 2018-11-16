<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancyCriterion extends Model
{
    protected $table = 'vacancy_criteria';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'criterion_id',
        'vacancy_id',
        'punctuation'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'criterion_id',
        'vacancy_id',
        'punctuation'
    ];

    // Relationships
    public function applicationCriteria()
    {
        return $this->hasMany(ApplicationCriterion::class);
    }
}
