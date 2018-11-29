<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = 'titles';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    // Protect table fields
    protected $fillable = [
        'description',
    ];

    // Protect table sorted fields
    protected $sorted = [
        'description',
    ];

    public function vacancy()
    {
        return $this->hasOne(Vacancy::class);
    }
}
