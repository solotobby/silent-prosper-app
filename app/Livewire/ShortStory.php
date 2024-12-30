<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ShortStory extends Component
{

    public $content = '';
    public $description = '';
    public $title = '';

    public $categories;

    public function mount(){
        
        $this->categories = Category::all();
    }

    public function story(){

        $this->validate([
            'content' => 'required|string', // Add your validation rules
            'description' => 'required|string',
            'title' => 'required|string',
            'is_book' => 'required|boolean',
        ]);

    }

    public function render()
    {
        return view('livewire.short-story');
    }
}
