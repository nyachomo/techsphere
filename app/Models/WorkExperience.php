<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table='work_experiences';
    protected $fillable=[
        'start_date',
        'end_date',
        'company',
        'role',
        'achivement',
        'reason_for_leaving',
    ];

    protected function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function achievements(){
        return $this->hasMany(StudentWorkAchivement::class, 'work_id', 'id');
    }
}
