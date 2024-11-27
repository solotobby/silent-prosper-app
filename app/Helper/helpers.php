<?php

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Story;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (! function_exists('likeStory')) {
    function likeStory($storyId){
        
        $userId = Auth::id();
        $story = Story::findOrFail($storyId);

        $like = $story->likes()->where('user_id', $userId)->first();

        if ($like) {
            // Unlike the story
            $like->delete();
            $story->likes_count -= 1;
            $story->save();
        } else {
            // Like the story
            $story->likes()->create(['user_id' => $userId]);
            $story->likes_count += 1;
            $story->save();
        }

        return true;
    }
}

if (! function_exists('commentLike')) {
    function commentLike($commentId){ 
       

        $userId = Auth::id();

        $existingLike = CommentLike::where('user_id', $userId)
            ->where('comment_id', $commentId)
            ->first();

        $comment = Comment::where('id', $commentId)->first();

        if ($existingLike) {
            // Unlike the comment
            $existingLike->delete();
            $comment->count -= 1;
            $comment->save();
        } else {
            // Like the comment
            CommentLike::create([
                'user_id' => $userId,
                'comment_id' => $commentId,
            ]);
            $comment->count += 1;
            $comment->save();
        }

    }
}

if (! function_exists('addStoryComment')) {
    function addStoryComment($storyId, $comment){ 

        $comment = Comment::create([
            'story_id' => $storyId,
            'user_id' => Auth::id(),
            'content' => $comment,
        ]);
        if($comment){
            $story = Story::findOrFail($storyId);
            $story->comments_count += 1;
            $story->save();
        }
       
    }
}

if (! function_exists('addStoryBookmark')) {
    function addStoryBookmark($story){ 

        $bookmark = $story->bookmarks()->where('user_id', Auth::id())->first();
           
            if($bookmark){
                $bookmark->delete();
                $story->bookmark_counts -= 1;
                $story->save();
            }else{
                $story->bookmarks()->create(['user_id' => Auth::id()]);
                $story->bookmark_counts += 1;
                $story->save();
            }

    }
}

if (! function_exists('hasActiveSubscription')) {
    function hasActiveSubscription($user){ 
        
        return  @$user->userSubscription->is_active && Carbon::parse($user->userSubscription->ends_at)->isFuture();

    }
}