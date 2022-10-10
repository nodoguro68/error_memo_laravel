<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function memos()
    {
        return $this->hasMany('App\Models\Memo');
    }
}
