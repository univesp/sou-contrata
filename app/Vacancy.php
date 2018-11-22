<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'edict_id',
        'title',
        'payload',
        'phone',
        'postal_code',
        'matter',
        'offer',
        'type',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'edict_id',
        'title',
        'payload',
        'phone',
        'postal_code',
        'matter',
        'offer',
        'type',
    ];

    public function edict()
    {
        return $this->belongsTo(Edict::class);
    }

    public function vacancy_criteria()
    {
        return $this->hasMany(VacancyCriterion::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,
            'assignment_vacancies');
    }

}
