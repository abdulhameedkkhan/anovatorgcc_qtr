<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'facility_type',
        'message',
    ];
}
