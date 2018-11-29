<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriterionType extends Model
{
    protected $table = 'criterion_types';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'description',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'description',
    ];

    public function criteria()
    {
        return $this->belongsToMany(Criterion::class,
            'criteria_type');
    }
}
