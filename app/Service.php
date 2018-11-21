<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Protect table name
    protected $table = 'services';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];
    
    // Protect table fields
    protected $fillable = [
        'title',
        'description',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'title',
        'description',
    ];

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class,
            'assignment_vacancies');
    }
}
