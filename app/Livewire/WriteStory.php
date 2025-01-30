<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Spatie\Image\Image;

class WriteStory extends Component
{

    use WithFileUploads;

    public $content = '';
    public $description = '';
    public $title = '';
    public $img = '';
    public $category = '';
    public $is_book = '';
    public $is_xrated = '';
    public $audience = '';
   

    public $categories;

    public function mount(){
        $this->categories = Category::all();
    }

    public function story(){

        $this->validate([
            'description' => 'required|string',
            'title' => 'required|string',
            'img' => 'image|max:1024',
            'category' => 'required',
           
        ], [
            'description.required' => 'The Excerpt field is required.',
            'description.string' => 'The Excerpt must be a valid string.',
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a valid string.',
            'img.image' => 'The uploaded file must be an image.',
            'img.max' => 'The image size must not exceed 1MB.',
            'category.required' => 'The Category field is required.',
            
        ]);


        // $imagePath = $this->img ? $this->img->store('images', 'public') : null;
       
        $imageName = time().'.'.$this->img->extension();
        Image::load($this->img->path())
                ->optimize()
                ->save(public_path('images/'). $imageName);

        $imageUrl = 'images/'.$imageName;
        // dd($imageName);

        $rand = rand(999,99999);
        $slug = Str::slug($this->title).'-'.$rand;
        Story::create([
            'user_id' => Auth::user()->id, 
            '_id' => $rand,
            'category_id' => $this->category, 
            'title' => $this->title, 
            'description' => $this->description, 
            'slug' => $slug,
            'img' => $imageUrl, //$imagePath,
            'is_book' => $this->is_book == 1 ? true : false,
            'is_xrated' => $this->is_xrated == 1 ? true : false,
            'audience' => 'All'
        ]);

        return redirect('write/'.$slug);


        // dd($this->description);


    }

    public function render()
    {
        return view('livewire.write-story');
    }
}
