<?php

namespace App\Livewire;

use App\Models\StoryChapter;
use Livewire\Component;

class Read extends Component
{

    public $slug;
    public $chapter;

    public function mount($slug){
        // dd(readTime('3.634'));
        $this->chapter = StoryChapter::where('slug', $slug)->first();
        $this->chapter->visits += 1;
        $this->chapter->save();
    }

    public function render()
    {
        return view('livewire.read');
    }
}
