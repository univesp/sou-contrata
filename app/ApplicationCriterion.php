<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationCriterion extends Model
{
       // Protect table name
       protected $table = 'application_criterions';

       // Protect table fields
       protected $fillable = [
           'flag_on',
           'candidate_id',
           'vacancy_crit_id',
       ];
   
       // Protect table sorted fields
       protected $sorted = [
           'flag_on',
           'candidate_id',
           'vacancy_crit_id',
       ];
}
