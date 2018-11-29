<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

    protected $table = 'documents';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'rg_number', 'number_link', 'elector_title', 'elector_link', 'military_certificate', 'military_link', 'zone','uf_issue','section','date_issue','candidate_id',
    ];

    protected $hidden = [
        'id'
    ];

    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }
}
