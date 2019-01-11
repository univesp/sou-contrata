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
        'course_id',
        //'type',
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
        'course_id',
        //'type',
    ];

    public function edict()
    {
        return $this->belongsTo(Edict::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function vacancy_criteria()
    {
        return $this->hasMany(VacancyCriterion::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,
            'vacancies_services');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

}
