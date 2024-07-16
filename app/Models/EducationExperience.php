<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EducationExperience extends Model
{
    use HasFactory;

    protected $table='education_experiences';
    protected $fillable=[
        'start_date',
        'end_date',
        'school_attended',
        'course_studied',
        'grade_scored',
        'achivement',
    ];

    protected function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    
    public function achievements(){
        return $this->hasMany(StudentEducationAchivement::class, 'education_id', 'id');
    }
   
}
