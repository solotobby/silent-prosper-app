<?php

namespace App\Livewire;

use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookShelf extends Component
{
   
    public function render()
    {

        $stories = Story::whereHas('bookShelf', function ($query) {
            $query->where('user_id', Auth::id());
        })
        // ->with(['likes', 'comments', 'user']) // Load related data
        ->latest()->get();
        // ->paginate($this->perPage);
        return view('livewire.book-shelf', ['stories' => $stories]);
    }
}
