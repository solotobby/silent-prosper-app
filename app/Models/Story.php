<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['user_id','category_id', '_id', 'title', 'content', 'likes_count', 'comments_count', 'views_count',
         'is_completed', 'copyright', 'is_book', 'img', 'description', 'slug', 'is_published', 'is_under_review', 'is_xrated', 'audience'];

    public function user() {

        return $this->belongsTo(User::class);
        
    }

    public function chapters(){
        return $this->hasMany(StoryChapter::class, 'story_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
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

    public function bookShelf(){
        return $this->hasMany(BookShelf::class);
    }

    public function isBookShelfedByUser($userId)
    {
        return $this->bookShelf()->where('user_id', $userId)->exists();
    }
}
