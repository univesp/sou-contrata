<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

    protected $table = 'documents';

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'document_type','number','serie_number','zone','uf_issue','section','date_issue','candidate_id'
    ];

    protected $hidden = [
        'id'
    ];

    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }
}
