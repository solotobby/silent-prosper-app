<?php

namespace App\Livewire\Admin;

use App\Models\Story;
use App\Models\StoryChapter;
use Livewire\Component;

class ListChapter extends Component
{
    public $query;
    public $story;

    public function mount($query){
        $this->story = Story::where('slug', $this->query)->first();
    }

    public function publishStory(){
        dd('publish');
    }

    public function render()
    {
        return view('livewire.admin.list-chapter');
    }
}
