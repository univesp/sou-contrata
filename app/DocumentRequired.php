<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentRequired extends Model {

    protected $table = 'document_requireds';

    protected $guarded = ['id', 'candidate_id','created_at', 'update_at'];

    protected $fillable = [
        'id', 'candidate_id', 'document'
    ];

    protected $hidden = [
        'id','candidate_id'
    ];

    protected $sorted = [
        'id', 'candidate_id', 'document'
    ];

    public function candidates() {

        return $this->hasMany(
            Candidate::class);
    }
}
