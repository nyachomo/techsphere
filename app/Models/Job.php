<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table="jobs";
    protected $fillable=[
           'vacancy_no',
           'vacancy_name',
           'vacancy_description',
           'vacancy_responsibility',
           'vacancy_qualification',
           'no_of_position',
           'opening_date',
           'closing_date',
           'vacancy_status',
           'total_applicants',
    ];
}
