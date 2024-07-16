<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $table="communications";
    protected $fillable=[
       'recipient',
       'subject',
       'message',
        'status',
       'replied_by',
       'replied_message',
       'date_replied',
    ];

}
