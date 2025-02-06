<?php

namespace App\Livewire\Admin;

use App\Models\Story;
use Livewire\Component;

class ListStory extends Component
{

    public function render()
    {
        $stories = Story::where('is_published', 0)->latest()->paginate(10);
        return view('livewire.admin.list-story', ['stories' => $stories]);
    }
}
