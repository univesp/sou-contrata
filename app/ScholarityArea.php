<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScholarityArea extends Model
{
    // Protect table name
    protected $table = 'applications';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    // Protect table fields
    protected $fillable = [
        'area_id',
        'scholarity_id'
    ];

    // Protect table sorted fields
    protected $sorted = [
        'area_id',
        'scholarity_id'
    ];

    // Relationships
    public function scholarity()
    {
        return $this->belongsTo(Scholarity::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
