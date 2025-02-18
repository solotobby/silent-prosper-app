<?php

namespace App\Livewire;

use App\Models\BookShelf;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Story;
use App\Models\StoryRead;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class StoryDetails extends Component
{
    
    public $slug;

    use WithPagination;

    public $story; // Stores the current post
    public $comment; // Stores the comment input
    public $perPageComments = 3; // Number of comments to display per page
    public $commentStoryId; // To track the story being commented on
    public $commentSectionOpen = []; // Tracks which story's comment section is open
    public $reads;

    public function mount($slug){
        // 'likes', 'comments.user',
        $this->story = Story::with(['chapters'])->where('slug', $slug)->first();//findOrFail();
        $this->story->views_count += 1;
        $this->story->save();

        //fetch read 
        $this->reads = StoryRead::where('user_id', Auth::id())->where('story_id', $this->story->id)->pluck('story_chapter_id')
        ->toArray();

       

        $user = Auth::user();

        // if (Auth::check()) {

        //     // Check if the user is the author of the story
        //     if ($this->story->user_id == $user->id) {
        //         // Allow authors to read their own stories unlimitedly, but track views
        //         return; // Skip further checks for story restrictions
        //     }
            
           
        //         // Check if the user has an active subscription
        //         // $hasActiveSubscription = @$user->userSubscription->is_active && Carbon::parse($user->userSubscription->ends_at)->isFuture();
            
        //         if (!$this->hasActiveSubscription($user)) { //user not subscribed

        //             $alreadyRead = StoryRead::where('user_id', Auth::id())
        //                 ->where('story_chapter_id', $this->story->id)
        //                 ->exists();

        //             if (!$alreadyRead) {
        //                 // Count the total number of unique stories read by the user
        //                 $uniqueStoriesRead = StoryRead::where('user_id', Auth::id())->distinct('story_chapter_id')->count();
            
        //                 // If the user has already read 3 unique stories, redirect to the subscription page
        //                 if ($uniqueStoriesRead >= 2) {
        //                     // dd('subscription');
        //                     return redirect()->route('subscription.page');
        //                 }
            
                       
        //                 // Record this story as read
        //                 StoryRead::firstOrCreate([
        //                     'user_id' => Auth::id(),
        //                     'story_chapter_id' => $this->story->id,
        //                 ]);
        //             }
        //         }else{
        //             //subscribed user
        //             StoryRead::firstOrCreate([
        //                 'user_id' => $user->id,
        //                 'story_chapter_id' => $this->story->id,
        //             ]);

        //         }

        // }

    }

 

   

    // public function bookmarkStory($storyId){
    //     $user = Auth::user();
    //     dd($user);
    //     $story = Story::findOrFail($storyId);
       
    //     if ($story->user_id === $user->id || hasActiveSubscription($user)) {

    //         addStoryBookmark($story);

    //         $this->story->refresh();

    //     }else{
    //         return redirect()->route('subscription.page');
    //     }
         
    // }

    // public function hasActiveSubscription($user){
    //    return  @$user->userSubscription->is_active && Carbon::parse($user->userSubscription->ends_at)->isFuture();
       
    // }


    // public function toggleLike($storyId)
    // {

       
    //     likeStory($storyId);

    //     $this->story->refresh();

    // }

    // public function toggleComments($storyId)
    // {
    //     // Toggle the comment section for the given story ID
    //     $this->commentSectionOpen[$storyId] = !($this->commentSectionOpen[$storyId] ?? false);
    // }


    // public function addComment($storyId)
    // {
    //     $this->validate([
    //         'comment' => 'required|string|max:255',
    //     ]);
        
    //     addStoryComment($storyId, $this->comment);

    //     $this->comment = ''; // Reset comment input
    //     $this->commentStoryId = null; // Reset the tracked story
    //     $this->story->refresh(); // Refresh post data to include the new comment
    // }

    // public function loadMoreComments()
    // {
    //     $this->perPageComments += 5; // Increase the number of comments displayed
    // }

    // public function toggleCommentLike($commentId)
    // {

    //     commentLike($commentId);

    // }

    public function addBookShelf($storyId){

        $story = Story::findOrFail($storyId);

        $bookshelf = $story->bookShelf()->where('user_id', Auth::id())->first();
        if($bookshelf){
            $bookshelf->delete();
             session()->flash('message', 'Story removed from BookShelf successfully!');
             $this->story->refresh();
        }else{
            $story->bookShelf()->create(['user_id' =>Auth::id()]);
             session()->flash('message', 'Story added to BookShelf successfully!');
             $this->story->refresh();
        }
        // BookShelf::create(['user_id' => Auth::id(), 'story_id' => $storyId]);
       
    }

   

    public function render()
    {
        $story = Story::with(['chapters', 'reads'])->where('slug', $this->slug)->first();
       
        return view('livewire.story-details', ['story' => $story]);
        
        // [
        //     'comments' => $this->story->comments()->latest()->paginate($this->perPageComments),
        // ]);
        // return view('livewire.story-details');
    }
}
