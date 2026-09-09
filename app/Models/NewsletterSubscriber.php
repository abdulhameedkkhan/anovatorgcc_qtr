<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'city',
        'country',
        'email',
    ];
}
