<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWorkAchivement extends Model
{
    use HasFactory;

    protected $table="student_work_achivements";
    protected $fillable=[
          'student_work_achivement',
          'work_id',
    ];

    public function workexperience(){
        return $this->belongsTo(WorkExperience::class,'work_id','id');
    }
}
