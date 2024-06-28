<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class ProfileIndex extends Component
{
    public $breadcrumbData = [
        ['label' => 'My Profile', 'url' => '/profile'],
    ];

    public function render()
    {
        return view('livewire.profile.profile-index')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => 'My Profile']);
    }
}
