<?php

namespace App\Livewire\Admin;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public function render()
    {
        $users = ModelsUser::where('role', 'regular')->orderBy('created_at', 'DESC')->paginate(20);
        return view('livewire.admin.user', ['users' => $users]);
    }
}
