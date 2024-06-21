<?php

namespace App\Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavbarHeader extends Component
{
    public $name;

    public function mount()
    {
        $this->name = Auth::user()->name;
    }
    
    public function render()
    {
        return view('livewire.component.navbar-header');
    }
}
