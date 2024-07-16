<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leed extends Model
{
    use HasFactory;

    protected $table='leeds';
     protected $fillable=[
        'student_fullname',
        'student_email',
        'student_phone',
        'student_gender',
        'student_school',
        'student_form',
        'comment',
        'year_data_captured',
        'parent_name',
        'parent_phone',
        'parent_email',
        'student_location',

     ];
}
