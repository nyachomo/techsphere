<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table='courses';
    protected $fillable=[
        'name',
        'level',
        'duration',
        'price',
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }
}
