<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function memos()
    {
        return $this->hasMany('App\Models\Memo');
    }
}
