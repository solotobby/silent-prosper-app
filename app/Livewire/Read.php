<?php

namespace App\Livewire;

use App\Models\StoryChapter;
use Livewire\Component;

class Read extends Component
{

    public $slug;
    public $chapter;
    public $comment;
    public $perPageComments = 3;

    public function mount($slug){
        // dd(readTime('3.634'));
        $this->chapter = StoryChapter::with(['comments'])->where('slug', $slug)->first();
        // dd($this->chapter);
        $this->chapter->visit_count += 1;
        $this->chapter->save();
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
