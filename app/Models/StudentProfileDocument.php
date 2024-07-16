<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfileDocument extends Model
{
    use HasFactory;
    protected $table='student_profile_documents';
    protected $fillable=[
       'document_name',
        'document_type',
        'document_file',
        'student_id',
    ];

    protected function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
