<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edict extends Model
{
    // Protect table name
    protected $table = 'edicts';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    // Protect table fields
    protected $fillable = [
        'edict_link',
        'date_start',
        'date_end',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'edict_link',
        'date_start',
        'date_end',
    ];
}
