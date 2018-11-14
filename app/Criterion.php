<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $table = 'critaria';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'criterion_id',
        'title'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'criterion_id',
        'title'
    ];
}
