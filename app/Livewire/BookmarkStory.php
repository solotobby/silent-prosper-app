<?php

namespace App\Livewire;

use App\Models\Story;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookmarkStory extends Component
{
    use WithPagination;
    public $perPage = 10;

    public $comment = '';
    public $commentStoryId; // To track the story being commented on
    public $commentSectionOpen = []; // Tracks which story's comment section is open
    public $perPageComments = 3; 

    public function toggleLike($storyId)
    {

        likeStory($storyId);

    }


    public function bookmarkStory($storyId){
        $user = Auth::user();
        $story = Story::findOrFail($storyId);
       
        if ($story->user_id === $user->id || hasActiveSubscription($user)) {

            addStoryBookmark($story);

        }else{
            return redirect()->route('subscription.page');
        }
         
    }


    public function addComment($storyId)
    {
        $this->validate([
            'comment' => 'required|string|max:255',
        ]);
        
        addStoryComment($storyId, $this->comment);

        $this->comment = ''; // Reset comment input
        $this->commentStoryId = null; // Reset the tracked story
        // $this->story->refresh(); // Refresh post data to include the new comment
    }

    public function loadMore()
    {
       
        $this->perPage += 5; // Load 5 more stories
    }

    public function toggleComments($storyId)
    {
        // Toggle the comment section for the given story ID
        $this->commentSectionOpen[$storyId] = !($this->commentSectionOpen[$storyId] ?? false);
    }


    public function loadMoreComments()
    {
        $this->perPageComments += 3; // Increment the number of comments to load
    }

    public function toggleCommentLike($commentId)
    {
        commentLike($commentId);
    }


    public function render()
    {
        // $stories = Story
        $bookmarkedStories = Story::whereHas('bookmarks', function ($query) {
            $query->where('user_id', Auth::id());
        })->with(['likes', 'comments', 'user']) // Load related data
        ->latest()
        ->paginate($this->perPage);
        return view('livewire.bookmark-story', ['stories' => $bookmarkedStories]);
    }
}
