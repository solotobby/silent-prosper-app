<?php

namespace App\Livewire\Admin;

use App\Models\StoryChapter;
use Livewire\Component;

class ReadStory extends Component
{
    public $query;
    public $chapter;
    public $nextChapter;

    public function mount($query){
        $this->chapter = StoryChapter::where('slug', $query)->first();
        $this->nextChapter = $this->chapter
                    ->where('story_id', $this->chapter->story_id)
                    ->where('id', '>', $this->chapter->id)->orderBy('id', 'asc')
                    ->first();
    }
    public function render()
    {
        return view('livewire.admin.read-story');
    }
}
