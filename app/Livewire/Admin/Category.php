<?php

namespace App\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{

    public $name;
    public $categories;

    // public function mount()
    // {
    //     $this->categories = ModelsCategory::orderBy('created_at', 'DESC')->get();
    // }

    public function saveCategory(){
        $this->validate([
            'name' => 'required|string|unique:categories'
        ], [
            'name.required' => 'Category name field is required.',
            'name.string' => 'Category name must be a valid string.',
            'name.unique' => 'Category name already exist.',
            
        ]);

        ModelsCategory::create(['name' => $this->name]);
        $this->reset(['name']);
        //$this->categories->refresh();
        session()->flash('success', 'Category posted successfully!');

        
    }

    public function render()
    {
        $this->categories = ModelsCategory::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.category', ['categories' => $this->categories]);
    }
}
