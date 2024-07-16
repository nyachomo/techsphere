<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducationAchivement extends Model
{
    use HasFactory;

    protected $table="student_education_achivements";

    protected $fillable=[
       'student_education_achivement',
        'education_id',
    ];

    protected function educationexperience(){
        return $this->belongsTo(EducationExperience::class, 'education_id', 'id');
    }
}
