<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subarea extends Model
{
    // Protect table name
    protected $table = 'applications';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    // Protect table fields
    protected $fillable = [
        'description'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'description'
    ];

    // Relationships
    public function areaSubareas()
    {
        return $this->hasMany(AreaSubarea::class);
    }
    
}
