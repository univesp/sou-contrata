<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaSubarea extends Model
{
    // Protect table name
    protected $table = 'applications';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    // Protect table fields
    protected $fillable = [
        'area_id',
        'subarea_id'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'area_id',
        'subarea_id'
    ];

    // Relationships
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    
    public function subArea()
    {
        return $this->belongsTo(SubArea::class);
    }
}
