<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Story;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Spatie\Image\Image;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Drivers\Gd;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Illuminate\Support\Facades\File;



class WriteStory extends Component
{

    use WithFileUploads;

    public $content = '';
    public $description = '';
    public $title = '';
    public $img;
    public $category = '';
    public $sub_category_id;
    public $is_book = '';
    public $is_xrated = false;
    public $audience = '';
    public $slug;
    public $story;
    public $categories;

    public $subcategories = [];
    // public $selectedCategory = null;
    public $selectedSubcategory = null;


    public function mount($slug=null){
        $this->slug = $slug;
        if($slug){
            $this->story = Story::where('slug', $slug)->first();
            $this->title = $this->story->title;
            $this->description = $this->story->description;
            $this->category = $this->story->category_id;
            $this->is_book = $this->story->is_book;
            $this->is_xrated = (bool)$this->story->is_xrated;
            $this->img = $this->story->img;
            $this->sub_category_id = $this->sub_category_id;

        }

        $this->categories = Category::all();
    }

    


    public function saveStory(){

        $this->validate([
            'description' => 'required|string',
            'title' => 'required|string',
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:1024', //image|
            'category' => 'required',
            'sub_category_id' => 'required',
        
        ], [
            'description.required' => 'The Excerpt field is required.',
            'description.string' => 'The Excerpt must be a valid string.',
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a valid string.',
            'img.image' => 'The uploaded file must be an image.',
            'img.max' => 'The image size must not exceed 1MB.',
            'category.required' => 'The Category field is required.',
            'sub_category_id.required' => 'The Sub Category field is required.',
            
        ]);



        $rand = rand(999,99999);
        $slug = Str::slug($this->title).'-'.$rand;

        // if ($this->img instanceof TemporaryUploadedFile) {
        //     $path = Storage::disk('s3')->put('eclatspad/'.$this->img, 'public');
        //     $s3Url = Storage::disk('s3')->url($path);
        //     // Then assign it back to the property.
        //     $this->img = $s3Url;
        // }

        $path = $this->img->store('eclatspad', 's3', 'public');
       
        $url = Storage::disk('s3')->url($path);




        // $imgUrl = $this->img->store('story_img', 'public');

        // Store file in public/uploads directory
        // $fileName = time() . '.' . $this->img->getClientOriginalExtension();
        // $this->img->storeAs('uploads', $fileName, 'public_uploads');

        $data = [
            'user_id' => Auth::user()->id, 
            '_id' => $rand,
            'category_id' => $this->category, 
            'sub_category_id' => $this->sub_category_id, 
            'title' => $this->title,
            'description' => $this->description, 
            'slug' => $slug,
            'img' =>$url, //$this->img,
            'is_book' => $this->is_book == 1 ? true : false,
            'is_xrated' => $this->is_xrated == 1 ? true : false,
            'audience' => 'All',
            'is_published' => false
        ];

        if(!$this->slug){
            Story::create($data);
            return redirect('write/'.$slug);
        }else{
            $this->story->update($data);
            return redirect('show/'.$slug); //redirect to story details page
        }
        
    }

    public function story(){

        $this->validate([
            'description' => 'required|string',
            'title' => 'required|string',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
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

            $rand = rand(999,99999);
            $slug = Str::slug($this->title).'-'.$rand;
            
            // If a new file is uploaded, upload to S3

        if ($this->img instanceof \Livewire\TemporaryUploadedFile) {
            $path = Storage::disk('s3')->put('eclatspad', $this->img, 'public');
            // Replace $this->img with the full S3 URL.
            $this->img = Storage::disk('s3')->url($path);
        }

            // $path = Storage::disk('s3')->put('eclatspad', $this->img, 'public');

            // $path = Storage::disk('s3')->url($path);

            $data = [
                'user_id' => Auth::user()->id, 
                '_id' => $rand,
                'category_id' => $this->category, 
                'title' => $this->title, 
                'description' => $this->description, 
                'slug' => $slug,
                'img' => $this->img,
                'is_book' => $this->is_book == 1 ? true : false,
                'is_xrated' => $this->is_xrated == 1 ? true : false,
                'audience' => 'All',
                'is_published' => false
            ];

            if(!$this->slug){
                Story::create($data);
                return redirect('write/'.$slug);
            }else{
                $this->story->update($data);
                return redirect('show/'.$slug); //redirect to story details page
            }


        // $imageName = time().'.'.$this->img->extension();
            // $imagePath = $this->img ? $this->img->store(public_path('images/'.$imageName)) : null; //$this->img->store('images', 'public') : null;
        
            // $imageName = time().'.'.$this->img->extension();
            // Image::load($this->img->path())
            //         ->optimize()
            //         ->save(public_path('images/'). $imageName);

            // $imageUrl = 'images/'.$imageName;
            // dd($imageName);

            // $filePathBanner = 'banners/' . $imageName;


    }

    public function render()
    {
        return view('livewire.write-story');
    }
}
