<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class ProfileIndex extends Component
{
    public $breadcrumbData, $title, $editUserByAdmin = false, $user_id;

    public function mount($id = null)
    {
        if ($id == null) {
            $this->breadcrumbData = [
                ['label' => 'My Profile', 'url' => '/profile'],
            ];

            $this->title = 'My Profile';
        } else {
            $this->breadcrumbData = [
                ['label' => 'Edit Data User', 'url' => '/profile'],
            ];

            $this->user_id = $id;
            $this->editUserByAdmin = true;
            $this->title = 'Edit Data User';
        }
    }

    public function render()
    {
        return view('livewire.profile.profile-index')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => $this->title]);
    }
}
