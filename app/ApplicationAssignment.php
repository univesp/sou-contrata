<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class application_assignment extends Model
{
    protected $table = 'application_assignments';

    protected $guarded = ['id', 'created_at', 'update_at'];


    // Protect table sorted fields
    protected $sorted = [
        'flag_ok'
    ];
}
