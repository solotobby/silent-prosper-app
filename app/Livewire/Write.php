<?php

namespace App\Livewire;

use App\Models\Story;
use App\Models\StoryChapter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Write extends Component
{

    public $slug;
    public $story;
    public $title;
    public $body;


    public function mount($slug){

        $this->story = Story::where('slug', $slug)->first();

    }

    public function post(){
      
        $rand = rand(999,99999);
        $slug = Str::slug($this->title).'-'.$rand;

        StoryChapter::create([
            'story_id' => $this->story->id, 
            'user_id' => Auth::id(), 
            'body'=>$this->body, 
            'title'=>$this->title,
            'slug' => $slug,
            '_id' => $rand
        ]);

        if(!$this->story->is_book){
            $this->story->is_completed = true;
            $this->story->save();
        }
       

        $this->reset(['body', 'title']);
        session()->flash('message', 'Story posted successfully!');

    }

    public function render()
    {
        return view('livewire.write');
    }
}
