<?php

namespace App\Livewire\Admin;

use App\Models\Story;
use Livewire\Component;

class ListStory extends Component
{

    public $status;
    public $storyStatus;

    public function mount($status){
        
        $this->status = $status;
        if($status == 'published'){
            $this->storyStatus = 1;
        }else{
            $this->storyStatus = 0;
        }
    }

    public function render()
    {
        $stories = Story::where('is_published', $this->storyStatus)->latest()->paginate(10);
        return view('livewire.admin.list-story', ['stories' => $stories, 'status' => $this->status]);
    }
}
