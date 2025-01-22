<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryRead extends Model
{
    protected $fillable = ['user_id', 'story_chapter_id', 'story_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
