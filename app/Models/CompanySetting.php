<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    use HasFactory;
    protected $table="company_settings";

    protected $fillable=[
       'company_logo',
       'company_name',
       'company_vission',
        'company_mission',
       'company_phone',
        'company_email',
       'company_address',
       'facebook_link',
       'twitter_link',
       'instagram_link',
       'linkdln_link',
       'youtube_link',
    ];
}
