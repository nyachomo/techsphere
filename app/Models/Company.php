<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table='companies';
    protected $fillable=[
        'company_name',
        'company_industry',
        'company_county',
        'company_town',
        'company_contact_person_name',
        'company_contact_person_email',
        'company_contact_person_phone',
    ];
}
