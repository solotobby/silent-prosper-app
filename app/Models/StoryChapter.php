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

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function getLikesSummary()
    {
        $likesCount = $this->likes()->count();

        if ($likesCount > 2) {
            // Eager load 'user' relation to access user names
            $lastTwoLikes = $this->likes()->latest()->take(2)->with('user')->get();

            // Convert user names to clickable links
            $userLinks = $lastTwoLikes->map(function ($like) {
                return '<a class="fw-semibold" href="profile/' . $like->user->username . '">' . htmlspecialchars($like->user->name) . '</a>';
            })->implode(', ');

            $otherLikesCount = $likesCount - 2;

            return "$userLinks and $otherLikesCount others liked this story.";
        } else {
            $allLikes = $this->likes()->latest()->with('user')->get();

            // Convert all user names to clickable links
            $userLinks = $allLikes->map(function ($like) {
                return '<a class="fw-semibold" href="profile/' . $like->user->username . '">' . htmlspecialchars($like->user->name) . '</a>';
            })->implode(', ');

            return "$userLinks liked this story.";
        }
    }




}
