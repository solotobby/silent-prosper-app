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
    public $chapter;
    public $story;
    public $title;
    public $body;
    public $is_completed;


    public function mount($slug = null){

        $this->slug = $slug;
        //continue writing
        if($slug){
            $this->story = Story::where('slug', $slug)->first();
            // $this->title = $this->story->chapter->title;
        }

    }

    public function post(){

        $rand = rand(999,99999);
        $slug = Str::slug($this->title).'-'.$rand;
       
        $readtime = $this->calculateReadTime($this->body);
        
        $storyChapter = StoryChapter::create([
            'story_id' => $this->story->id, 
            'user_id' => Auth::id(), 
            'body'=>$this->body, 
            'title'=>$this->title,
            'slug' => $slug,
            '_id' => $rand,
            'read_time' => $readtime
        ]);

        if($this->is_completed == true){
            $this->story->is_completed = 1;
            $this->story->save();
        }

        // if(!$this->story->is_book){
        //     $this->story->is_completed = true;
        //     $this->story->save();
        // }

        $this->reset(['body', 'title']);
        session()->flash('message', 'Story posted successfully!');

        return redirect('preview/chapter/'.$storyChapter->slug);
    }

    private function calculateReadTime($content)
    {
        
        $wordCount = str_word_count(strip_tags($content)); // Remove any HTML tags
        $averageReadingSpeed = 200; // Words per minute
        $readTime = number_format($wordCount / $averageReadingSpeed, 2); // Round up to nearest minute
        return $readTime;
    }

    

    public function render()
    {
        return view('livewire.write');
    }
}
