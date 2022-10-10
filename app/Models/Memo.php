<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = [
        'category_id',
        'folder_id',
        'is_solved',
        'is_published',
        'title',
        'content',
        'attempt',
        'solution',
        'cause',
        'reference',
    ];
}
