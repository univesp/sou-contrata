<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAssignment extends Model
{
    protected $table = 'application_assignments';

    protected $guarded = ['id', 'created_at', 'update_at'];

    
    // Protect table fields
    protected $fillable = [
        'flag_ok', 'application_id', 'service_id'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'flag_ok', 'application_id', 'service_id'
    ];
}
