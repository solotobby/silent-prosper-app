<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Story;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\ArrayList;

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
    public $isFollowing; // State of following
    public $username;
   
    public $stories;
    protected $listeners = ['refreshUserProfile' => '$refresh']; // Add this line


    public function mount($username){

        $this->username = $username;
        
        //$this->hasActiveSubscription = $user->subscription && $user->subscription->ends_at->isFuture();
        $this->user = User::withPostStats($this->username)->first();
      
        $this->subscription = $this->user->getSubscriptionDetails(); 
        // dd($this->user->isSubscribed());

        $this->isFollowing = $this->checkIfFollowing();

        $this->stories = $this->storyList();

    }

    public function toggleFollow()
    {
        if ($this->isFollowing) {
            Auth::user()->followings()->detach($this->user->id);
        } else {
            Auth::user()->followings()->attach($this->user->id);
        }

        $this->isFollowing = !$this->isFollowing;
    }

    private function checkIfFollowing()
    {
        return Auth::user()->followings()->where('followed_id', $this->user->id)->exists();
    }

    public function deleteStory($storyId){

        $story = Story::where('id', $storyId)->first();
        $usr = $story->img;  
        $filename = 'eclatspad/'.basename($usr);
    
        Storage::disk('s3')->delete($filename);
        $story->delete();
        session()->flash('message', 'Story deleted!');
       
        return redirect()->to('/profile/'.$story->user->username);
        // $this->dispatch('refreshUserProfile');
        // redirect('profile/'.$story->user->username);
       
    }

    // public function addComment($storyId)
    // {
    //     $this->validate([
    //         'comment' => 'required|string|max:255',
    //     ]);
        
    //     $comment = Comment::create([
    //         'story_id' => $storyId,
    //         'user_id' => Auth::id(),
    //         'content' => $this->comment,
    //     ]);
    //     if($comment){
    //         $story = Story::findOrFail($storyId);
    //         $story->comments_count += 1;
    //         $story->save();
    //     }
       

    //     $this->comment = ''; // Reset comment input
    //     $this->commentStoryId = null; // Reset the tracked story

    // }

    // public function bookmarkStory($storyId){
    //     $user = Auth::user();
    //     $story = Story::findOrFail($storyId);
       
    //     if ($story->user_id === $user->id || $this->hasActiveSubscription($user)) {

    //         addStoryBookmark($story);

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

    // }

    // public function loadMore()
    // {
       
    //     $this->perPage += 10; // Load 10 more stories
    // }

    // public function toggleComments($storyId)
    // {
    //     // Toggle the comment section for the given story ID
    //     $this->commentSectionOpen[$storyId] = !($this->commentSectionOpen[$storyId] ?? false);
    // }

    // public function loadMoreComments()
    // {
    //     $this->perPageComments += 5; // Increment the number of comments to load
    // }

    // public function toggleCommentLike($commentId)
    // {
    //     commentLike($commentId);
        
    // }

    public function storyList() {
        if(auth()->user()->id === $this->user->id){
           return Story::where('user_id', $this->user->id)->latest()->get();
        }else{
           return Story::where('user_id', $this->user->id)->where('is_published', true)->latest()->get();
        }
    }


    public function render()
    {
        $stories = $this->storyList();
        
        return view('livewire.user-profile',
            ['stories' => $stories]
        ); 
        
        // [
        //     'stories' => Story::with(['likes', 'comments.user' => function ($query) {
        //         $query->latest(); // Fetch comments in descending order
        //     }])->where('user_id', $this->user->id)->latest()->get(),//->paginate($this->perPage),
        // ]);
    }
}
