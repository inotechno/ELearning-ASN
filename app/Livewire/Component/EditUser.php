<?php

namespace App\Livewire\Component;

use Livewire\Component;

class EditUser extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function showModal($id)
    {
        $this->dispatch('showModalEdit');
    }

    public function render()
    {
        return view('livewire.component.edit-user');
    }
}
