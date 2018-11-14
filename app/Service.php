<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Protect table name
    protected $table = 'services';

    // Protect table fields
    protected $fillable = [
        'title',
        'description',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'title',
        'description',
    ];
}
