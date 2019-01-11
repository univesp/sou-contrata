<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id', 'created_at', 'update_at'];


    protected $fillable = [
        'description',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'description',
    ];

    public function disciplines(){
        return $this->belongsToMany(Discipline::class, 'course_discipline');
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
