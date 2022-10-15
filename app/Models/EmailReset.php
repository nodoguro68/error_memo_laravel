<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailReset extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'token',
    ];
}
