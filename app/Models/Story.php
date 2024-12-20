<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['user_id','category_id', '_id', 'content', 'likes_count', 'comments_count', 'views_count'];

    public function user() {

        return $this->belongsTo(User::class);
        
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }
    public function isBookmarkedBy($userId)
    {
        return $this->bookmarks()->where('user_id', $userId)->exists();
    }

    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reads()
    {
        return $this->hasMany(StoryRead::class);
    }
}
