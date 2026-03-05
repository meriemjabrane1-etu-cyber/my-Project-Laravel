<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'age',
        'email',
        'phone',
        'school',
        'gender',
        'english_level',
        'campus',
        'terms'
    ];

    protected $casts = [
        'school' => 'array',
        'terms' => 'boolean'
    ];
}
