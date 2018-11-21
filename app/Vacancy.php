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
        'matter'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'edict_id',
        'title',
        'payload',
        'phone',
        'postal_code',
        'matter',
    ];

    public function edict()
    {
        return $this->belongsTo(Edict::class);
    }


    public function criteria()
    {
        return $this->belongsToMany(Criterion::class,
            'vacancy_criteria');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,
            'vacancy_criteria');
    }

}
