<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['story_chapter_id', 'user_id', 'content'];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

}
