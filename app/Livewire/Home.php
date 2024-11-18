<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Story;
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
    public $perPage = 3; // Initial number of stories p
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
        $this->perPage += 3; // Load 5 more stories
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

    public function render()
    {
        // return view('livewire.home');

        return view('livewire.home', [
            'stories' => Story::with(['likes', 'comments.user' => function ($query) {
                $query->latest(); // Fetch comments in descending order
            }])->latest()->paginate(5),
        ]);
    }
}
