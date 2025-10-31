<?php

namespace App\Livewire;

use App\Models\Story;
use App\Models\StoryChapter;
use App\Models\StoryRead;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Read extends Component
{

    public $slug;
    public $chapter;
    public $nextChapter;
    public $comment;
    public $perPageComments = 5;

    public function mount($slug)
    {
        // dd(readTime('1.69'));
        $this->chapter = StoryChapter::with(['comments', 'user', 'likes'])->where('slug', $slug)->first();

        if ($this->chapter) {
            $this->chapter->visit_count += 1;
            $this->chapter->save();

            $user = Auth::user();

            if (Auth::check()) {
                // Check if the user is the author of the story
                if ($this->chapter->story->user_id == $user->id) {

                    // Allow authors to read their own stories unlimitedly, but track views
                    //next chapter
                    $this->nextChapter = $this->chapter
                        ->where('story_id', $this->chapter->story_id)
                        ->where('id', '>', $this->chapter->id)->orderBy('id', 'asc')
                        ->first();
                    return; // Skip further checks for story restrictions
                }

                StoryRead::firstOrCreate([
                    'user_id' => Auth::id(),
                    'story_id' => $this->chapter->story_id,
                    'story_chapter_id' => $this->chapter->id,
                ]);

                $this->nextChapter = $this->chapter
                    ->where('story_id', $this->chapter->story_id)
                    ->where('id', '>', $this->chapter->id)->orderBy('id', 'asc')
                    ->first();


                // if (!$this->hasActiveSubscription($user)) { //user not subscribed

                //     $alreadyRead = StoryRead::where('user_id', Auth::id())
                //         ->where('story_id', $this->chapter->story_id)
                //         ->where('story_chapter_id', $this->chapter->id)
                //         ->exists();

                //     if (!$alreadyRead) {   

                //             // Count the total number of unique stories read by the user
                //             $uniqueStoriesRead = StoryRead::where('user_id', Auth::id())
                //             ->where('story_id', $this->chapter->story_id)
                //             ->distinct('story_chapter_id')->count();

                //             // If the user has already read 3 unique stories, redirect to the subscription page
                //             if ($uniqueStoriesRead >= 2) {
                //                 // dd('subscription');
                //                 return redirect()->route('subscription.page');
                //             }

                //             StoryRead::firstOrCreate([
                //                 'user_id' => Auth::id(),
                //                 'story_id' => $this->chapter->story_id,
                //                 'story_chapter_id' => $this->chapter->id,
                //             ]);


                //     }

                //     $this->nextChapter = $this->chapter
                //     ->where('story_id', $this->chapter->story_id)
                //     ->where('id', '>', $this->chapter->id)->orderBy('id', 'asc')
                //     ->first();

                // }else{

                //     StoryRead::firstOrCreate([
                //         'user_id' => Auth::id(),
                //         'story_id' => $this->chapter->story_id,
                //         'story_chapter_id' => $this->chapter->id,
                //     ]);

                //     $this->nextChapter = $this->chapter
                //     ->where('story_id', $this->chapter->story_id)
                //     ->where('id', '>', $this->chapter->id)->orderBy('id', 'asc')
                //     ->first();

                // }

            }
        }
    }


    public function hasActiveSubscription($user)
    {

        return  @$user->userSubscription->is_active && Carbon::parse($user->userSubscription->ends_at)->isFuture();
    }



    public function addComment($storyId)
    {


        $this->validate([
            'comment' => 'required|string|max:255',
        ]);

        addStoryComment($storyId, $this->comment);

        $this->comment = ''; // Reset comment input
        // $this->commentStoryId = null; // Reset the tracked story

    }

    public function toggleLike($storyId)
    {

        likeStory($storyId);

        $this->chapter->refresh();
    }

    public function loadMoreComments()
    {
        $this->perPageComments += 5; // Increase the number of comments displayed
    }

    public function addBookShelf($storyId)
    {
        dd($storyId);
    }



    public function render()
    {
        // $chapter = StoryChapter::where('slug', $this->slug)->first();
        $comments =  $this->chapter->comments()->latest()->paginate($this->perPageComments);

        return view('livewire.read', [
            // 'chapter' => $chapter,
            'comments' => $comments
        ]);
    }
}
