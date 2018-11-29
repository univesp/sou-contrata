<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriterionType extends Model
{
    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'description',
    ];


    public function criteria(){
        return $this->belongsToMany(Criterion::class, 'criteria_type');
    }
}
