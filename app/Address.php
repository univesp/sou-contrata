<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'file_address', 'public_place','type_public_place','number','postal_code','complement','city','state', 'neighborhood'
    ];

    public function candidates()
    {
        return $this->belongsTo(Candidate::class);
    }
}
