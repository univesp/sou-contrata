<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $guarded = ['id', 'created_at', 'update_at'];


    protected $fillable = [
        'description',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'description',
    ];

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_discipline');
    }
}
