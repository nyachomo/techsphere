<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;

    protected $table='referees';
    protected $fillable=[
        'referee_name',
        'referee_phone',
        'referee_email',
        'referee_organisation',
        'referee_position',
        'years_knowing_referee',
        'student_id',
    ];

    protected function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
