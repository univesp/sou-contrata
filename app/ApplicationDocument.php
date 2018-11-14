<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model
{
    // Protect table name
    protected $table = 'application_document';

    // Protect table fields
    protected $fillable = [
        'flag_on',
        'candidate_id',
        'document_required_id',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'flag_on',
        'candidate_id',
        'document_required_id',
    ];
}
