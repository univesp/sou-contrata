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
        // 'scholarity_type',
        'teaching_institution',
        'candidate_id',
        'area_id'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'class_name',
        'end_date',
        'init_date',
        'link',
        // 'scholarity_type',
        'teaching_institution',
        'candidate_id',
        'area_id'
    ];

    // Relationships
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function scholarityAreas()
    {
        return $this->hasMany(ScholarityArea::class);
    }
}