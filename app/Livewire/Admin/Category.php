<?php

namespace App\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use App\Models\SubCategory;
use Livewire\Component;

class Category extends Component
{

    public $name;
    public $subCategory_name;
    public $categories;
    public $category_id;

  

    public function mount()
    {
        $this->categories = ModelsCategory::orderBy('created_at', 'DESC')->get();

        
    }

    public function postCategory(){

        
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
        session()->flash('success', 'Category Created successfully!');

        
    }

    public function saveSubCategory(){
       
        $this->validate([
            'subCategory_name' => 'required|string'
        ], [
            'subCategory_name.required' => 'Sub Category name field is required.',
            'subCategory_name.string' => 'Sub Category name must be a valid string.',
            'subCategory_name.unique' => 'Sub Category name already exist.',
            
        ]);

        SubCategory::create(['category_id' => $this->category_id, 'name' => $this->subCategory_name]);
        $this->reset(['name', 'category_id']);
        //$this->categories->refresh();
        session()->flash('success', 'Sub Category created successfully!');

    }

    public function render()
    {
        // $this->categories = ModelsCategory::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.category');
    }
}
