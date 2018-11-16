<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

    protected $table = 'documents';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'type','number','serie_number','zone','uf_emission','section','emission_date','link'
    ];

    protected $hidden = [
        'id'
    ];

    public function candidate() {

        return $this->belongsTo(Candidate::class);
    }
}
