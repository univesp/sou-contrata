<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model {

    protected $table = 'candidates';

    protected $fillable = [
        'name','last_name','date_birth', 'genre', 'curriculum_link', 'marital_status','cpf', 'flag_deficient', 'obs_deficient', 'name_mather', 'name_father', 'name_social', 'nationality', 'user_id'
    ];

    protected $sorted =  [
        'name','last_name','date_birth', 'genre', 'curriculum_link', 'marital_status','cpf', 'flag_deficient', 'obs_deficient', 'name_mather', 'name_father', 'name_social', 'nationality', 'user_id'
    ];

    protected $hidden = [
        'id','user_id'
    ];

    // Relationships
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function scholarities()
    {
        return $this->hasMany(Scholarity::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function address()
    {
        return $this->hasOne(Document::class);
    }

}
