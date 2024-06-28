<?php

namespace App\Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavbarHeader extends Component
{
    public $name;
    public $image;
    public $image_path;
    public $username;
    public $email;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->image = $user->image;
        $this->image_path = $user->image_path;
        $this->username = $user->username;
        $this->email = $user->email;
    }
    
    public function render()
    {
        return view('livewire.component.navbar-header');
    }
}
