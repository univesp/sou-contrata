<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    // Protect table name
    protected $table = 'areas';

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
    public function scholarityAreas()
    {
        return $this->hasMany(ScholarityArea::class);
    }

    public function areaSubareas()
    {
        return $this->hasMany(AreaSubarea::class);
    }
    public function scholarity()
    {
        return $this->belongsTo(Scholarity::class);
    }
}
