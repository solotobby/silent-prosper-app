<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Story;
use App\Models\StoryRead;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class StoryDetails extends Component
{
    
    public $postQuery;

    use WithPagination;

    public $story; // Stores the current post
    public $comment; // Stores the comment input
    public $perPageComments = 3; // Number of comments to display per page
    public $commentStoryId; // To track the story being commented on
    public $commentSectionOpen = []; // Tracks which story's comment section is open


    public function mount($query){
        $this->story = Story::with(['likes', 'comments.user'])->where('_id', $query)->first();//findOrFail();
        $this->story->views_count += 1;
        $this->story->save();
       
        if (Auth::check()) {

            $alreadyRead = StoryRead::where('user_id', Auth::id())
            ->where('story_id', $this->story->id)
            ->exists();

            if (!$alreadyRead) {
                // Count the total number of unique stories read by the user
                $uniqueStoriesRead = StoryRead::where('user_id', Auth::id())->distinct('story_id')->count();
    
                // If the user has already read 3 unique stories, redirect to the subscription page
                if ($uniqueStoriesRead >= 3) {
                    dd('subscription');
                    // return redirect()->route('subscription.page');
                }
    
                // Record this story as read
                StoryRead::firstOrCreate([
                    'user_id' => Auth::id(),
                    'story_id' => $this->story->id,
                ]);
            }

        }

    }

    public function toggleLike()
    {
        
        $user = Auth::id();

        if ($this->story->isLikedByUser($user)) {
            $this->story->likes()->where('user_id', $user)->delete();
           
            $this->story->likes_count -= 1;
            $this->story->save();
        } else {
            $this->story->likes()->create(['user_id' => $user]);
            $this->story->likes_count += 1;
            $this->story->save();
        }

        $this->story->refresh(); // Refresh the post to reflect the new like count
    }

    public function toggleComments($storyId)
    {
        // Toggle the comment section for the given story ID
        $this->commentSectionOpen[$storyId] = !($this->commentSectionOpen[$storyId] ?? false);
    }


    public function addComment($storyId)
    {
        $this->validate([
            'comment' => 'required|string|max:255',
        ]);

       $comment = Comment::create([
            'story_id' => $storyId,
            'user_id' => Auth::id(),
            'content' => $this->comment,
        ]);

        if($comment){
            $story = Story::findOrFail($storyId);
            $story->comments_count += 1;
            $story->save();
        }
       
        $this->comment = ''; // Clear the input
        $this->story->refresh(); // Refresh post data to include the new comment
    }

    public function loadMoreComments()
    {
        $this->perPageComments += 5; // Increase the number of comments displayed
    }

    public function toggleCommentLike($commentId)
    {
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



    public function render()
    {
        return view('livewire.story-details', [
            'comments' => $this->story->comments()->latest()->paginate($this->perPageComments),
        ]);
        // return view('livewire.story-details');
    }
}
