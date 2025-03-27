<?php

namespace App\Livewire;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Settings extends Component
{
    public $user;
    public $name;
    public $username;
    public $email;
    public $gender;
    public $about;

    public function mount(User $user)
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->gender = $this->user->gender;

        $profile = Profile::where('user_id', $this->user->id)->first();
        
        $this->about = $profile->about;
        
    }

    public function updateSettings(){

        $this->validate([
            'username' => 'required|string|unique:users,username,' . $this->user->id, // Exclude current user's username
            'name' => 'required|string',
        ], [
            'username.required' => 'The username field is required.',
            'username.string' => 'The username must be a valid string.',
            'username.unique' => 'The username already exists.', // If the username already exists
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
        ]);



        
         $user = User::where('email', $this->email)->firstOrFail();
         
         $user->name = $this->name;
         $user->username = $this->username;
         $user->save();

         $updateProfile = Profile::where('user_id', $user->id)->firstOrFail();
         $updateProfile->about = $this->about;
         $updateProfile->save();

         session()->flash('message', 'Information updated successfully!'); 
    }

    public function render()
    {
        
        return view('livewire.settings');
    }
}
