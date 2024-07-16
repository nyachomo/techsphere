<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalSummary extends Model
{
    use HasFactory;

    protected $table='professional_summaries';
    protected $fillable=[
       'professional_summary',
        'student_id',
    ];

    protected function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

}
