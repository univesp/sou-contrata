<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $table = 'users';

    // Protected guarded table fields
    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $fillable = [
        'id', 'name','login','password', 'email', 'cod_privilege'
    ];

    protected $sorted = [
        'name','login','password', 'email', 'cod_privilege'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
