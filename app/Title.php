<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{

    protected $guarded = ['id', 'created_at', 'update_at'];


    protected $fillable = [
        'description',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'description',
    ];

    public function vacancy()
    {
        return $this->hasOne(Vacancy::class);
    }

    public function criteria()
    {
        return $this->hasMany(Criterion::class);
    }
}
