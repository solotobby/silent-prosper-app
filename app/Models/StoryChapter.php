<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryChapter extends Model
{
    protected $fillable = ['story_id', 'user_id', 'body', 'visit_count', 'like_count', 'title', 'comment_count', 'read_time', 'slug', '_id'];

    public function story(){
        return $this->belongsTo(Story::class, 'story_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'story_chapter_id');
    }

    public function reads()
    {
        return $this->hasMany(StoryRead::class);
    }


}
