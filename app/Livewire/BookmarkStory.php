<?php

namespace App\Livewire;

use App\Models\Story;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookmarkStory extends Component
{
    use WithPagination;
    public $perPage = 10;

    public function render()
    {
        // $stories = Story
        $bookmarkedStories = Story::whereHas('bookmarks', function ($query) {
            $query->where('user_id', Auth::id());
        })->with(['likes', 'comments', 'user']) // Load related data
        ->latest()
        ->paginate($this->perPage);
        return view('livewire.bookmark-story', ['stories' => $bookmarkedStories]);
    }
}
