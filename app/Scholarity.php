<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarity extends Model
{
    // Protect table name
    protected $table = 'scholarities';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    // Protect table fields
    protected $fillable = [
        'class_name',
        'end_date',
        'init_date',
        'link',
        'scholarity_type',
        'teaching_institution',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'class_name',
        'end_date',
        'init_date',
        'link',
        'scholarity_type',
        'teaching_institution',
    ];

    // Relationships
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
