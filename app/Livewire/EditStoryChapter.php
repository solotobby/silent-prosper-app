<?php

namespace App\Livewire;

use App\Models\StoryChapter;
use Livewire\Component;

class EditStoryChapter extends Component
{

    public $slug;
    public $chapter;
    public $story;
    public $title;
    public $body;

    public function mount($slug){
        $this->slug = $slug;
        if($slug){
            $this->chapter = StoryChapter::where('slug', $slug)->first();
            $this->title = $this->chapter->title;
            $this->body = $this->chapter->body;

            $this->story = $this->chapter->story;
        }
    }

    public function updatePost(){
        $this->chapter->update(['title' => $this->title, 'body' => $this->body]);
        session()->flash('message', 'Chapter updated successfully!');
        // return redirect('show/'.$this->story->slug);
    }
    public function render()
    {
        return view('livewire.edit-story-chapter');
    }
}
