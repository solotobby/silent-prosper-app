<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryChapter extends Model
{
    protected $fillable = ['story_id', 'user_id', 'body', 'visits', 'likes', 'title', 'comments', 'read_time', 'slug', '_id'];

    public function story(){
        return $this->belongsTo(Story::class, 'story_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
