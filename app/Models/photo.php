<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    //
    protected $fillable = [
        'image',
        'photographer_name',
        'type'
         
    ];
}

