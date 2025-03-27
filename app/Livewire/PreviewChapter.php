<?php

namespace App\Livewire;

use App\Models\StoryChapter;
use Livewire\Component;

class PreviewChapter extends Component
{
    public $slug; 
    public $chapterPreview;

    public function mount($slug){
        $this->slug = $slug;
        $this->chapterPreview = StoryChapter::where('slug', $this->slug)->first();
    }
    public function render()
    {
        return view('livewire.preview-chapter');
    }
}
