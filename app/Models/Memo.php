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

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function folder()
    {
        return $this->belongsTo('App\Models\Folder');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getIsSolvedAttribute()
    {
        if($this->attributes['is_solved'] === 0){
            return '未解決';
        } else {
            return '解決済';
        }
    }
    public function getIsPublishedAttribute()
    {
        if($this->attributes['is_published'] === 0){
            return '非公開';
        } else {
            return '公開';
        }
    }
}
