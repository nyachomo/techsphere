<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    use HasFactory;

    protected $table='student_skills';
    protected $fillable=[
        'student_skills',
        'student_id',
    ];

    protected function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
