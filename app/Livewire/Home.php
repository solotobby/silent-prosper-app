<?php

namespace App\Livewire;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Story;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Home extends Component
{
    #[Validate('required|string')]
    public $content = '';

   
    public $category_id; // For category selection
    public $categories; // Categories list
    public $comment; // For adding comments
    public $selectedStory; // For targeted commenting
    public $perPage = 5; // Initial number of stories p
    public $commentStoryId; // To track the story being commented on
    public $commentSectionOpen = []; // Tracks which story's comment section is open
    public $perPageComments = 3; // Number of comments to load per story


    protected $listeners = ['storyCreated' => '$refresh']; // Refresh on new story
    protected $story;


    public function mount(Story $story)
    {
        $this->story = $story; // Inject the Story model
        $this->content = ''; // Initialize content

        $this->category_id = null;
        $this->comment = '';
        $this->selectedStory = null;

        // Fetch categories (static example or from DB)
        $this->categories = [
            1 => 'Category 1',
            2 => 'Category 2',
            3 => 'Category 3',
        ];


    }

    public function post(){
         // Validate input
         $this->validate([
            'content' => 'required|string', // Add your validation rules
        ]);


        Story::create(['user_id' => Auth::user()->id, '_id' => rand(999,99999), 'category_id' => 1, 'content' => $this->content]);

        $this->reset('content');

        $this->dispatch('close-modal');

        // Optionally, show a success message
        session()->flash('message', 'Story posted successfully!');
        $this->dispatch('storyCreated');
       

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

    public function bookmarkStory($storyId){
        $user = Auth::user();
        $story = Story::findOrFail($storyId);
       
        if ($story->user_id === $user->id || $this->hasActiveSubscription($user)) {

            $bookmark = $story->bookmarks()->where('user_id', $user->id)->first();
           
            if($bookmark){
                $bookmark->delete();
                $story->bookmark_counts -= 1;
                $story->save();
            }else{
                $story->bookmarks()->create(['user_id' => $user->id]);
                $story->bookmark_counts += 1;
                $story->save();
            }


        }else{
            return redirect()->route('subscription.page');
        }
         
    }

    public function hasActiveSubscription($user){
       return  @$user->userSubscription->is_active && Carbon::parse($user->userSubscription->ends_at)->isFuture();
       
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
        return view('livewire.home', [
            'stories' => Story::with(['likes', 'comments.user' => function ($query) {
                $query->latest(); // Fetch comments in descending order
            }
            // 'user.subscriptionPlans.subscription' => function ($query) {
            //     $query->where('is_active', true)->where('ends_at', '>', now());
            // }
            ])->latest()->paginate($this->perPage),
        ]);
    }
}
