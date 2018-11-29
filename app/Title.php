<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'description',
    ];


    public function criteria(){
        return $this->hasMany(Criterion::class);
    }
}
