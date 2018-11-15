<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    // Protect table name
    protected $table = 'applications';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

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
