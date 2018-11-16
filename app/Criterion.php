<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $table = 'criteria';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'criterion_id',
        'title',
        'subtitle',
        'name'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'criterion_id',
        'title',
        'subtitle',
        'name'
    ];

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class,
            'vacancy_criteria');
    }
}
