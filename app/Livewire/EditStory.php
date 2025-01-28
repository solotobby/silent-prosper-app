<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Story;
use Livewire\Component;

class EditStory extends Component
{

    public $slug;
    public $title;

    public function mount($slug){
        // dd($slug);
    }

    public function save(){
        dd($this->title);
    }

    public function render()
    {
        $categories = Category::all();
        $story = Story::where('slug', $this->slug)->first();
        return view('livewire.edit-story', ['categories' => $categories, 'story' => $story]);
    }
}
