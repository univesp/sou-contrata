<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    // Protect table name
    protected $table = 'applications';

    // Protect table fields
    protected $fillable = [
        'observation',
        'status',
        'candidate_id',
        'criterion_id',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'observation',
        'status',
        'candidate_id',
        'criterion_id'
    ];

}
