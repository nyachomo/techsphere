<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table='students';
    protected $fillable=[
        'name',
        'email',
        'phone',
        'course_id',
        'profile_image',

    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    protected function educations(){
        return $this->hasMany(EducationExperience::class);
    }

    protected function works(){
        return $this->hasMany(WorkExperience::class);
    }

    protected function referees(){
        return $this->hasMany(Referee::class);
    }

    protected function student_profile_documents(){
        return $this->hasMany(StudentProfileDocument::class);
    }
    protected function professional_summaries(){
        return $this->hasMany(ProfessionalSummary::class);
    }

    protected function student_skills(){
        return $this->hasMany(StudentSkill::class);
    }

    


}
