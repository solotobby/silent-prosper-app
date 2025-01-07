<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['story_chapter_id', 'user_id'];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
    
}
