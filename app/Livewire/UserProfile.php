<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Story;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;

    public $comment; // For adding comments
    public $selectedStory; // For targeted commenting
    public $perPage = 10; // Initial number of stories p
    public $commentStoryId; // To track the story being commented on
    public $commentSectionOpen = []; // Tracks which story's comment section is open
    public $perPageComments = 5; // Number of comments to load per story
    public $hasActiveSubscription;
    public $subscription;


    public function mount(User $user){
     
        //$this->hasActiveSubscription = $user->subscription && $user->subscription->ends_at->isFuture();
        $this->user = User::withPostStats($this->user->id)->first();
      
        $this->subscription = $this->user->getSubscriptionDetails(); 
        // dd($this->user->isSubscribed());

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
       

        $this->comment = ''; // Reset comment input
        $this->commentStoryId = null; // Reset the tracked story

    }

    public function toggleLike($storyId)
    {
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
    }

    public function loadMore()
    {
       
        $this->perPage += 10; // Load 10 more stories
    }

    public function toggleComments($storyId)
    {
        // Toggle the comment section for the given story ID
        $this->commentSectionOpen[$storyId] = !($this->commentSectionOpen[$storyId] ?? false);
    }

    public function loadMoreComments()
    {
        $this->perPageComments += 5; // Increment the number of comments to load
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
        return view('livewire.user-profile', [
            'stories' => Story::with(['likes', 'comments.user' => function ($query) {
                $query->latest(); // Fetch comments in descending order
            }])->where('user_id', $this->user->id)->latest()->paginate($this->perPage),
        ]);
    }
}
