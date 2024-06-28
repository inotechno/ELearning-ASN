<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserAccount extends Component
{
    use WithFileUploads, LivewireAlert;

    public $name, $front_name, $back_name, $email, $image, $username, $imagePreview, $image_path;

    public function mount()
    {
        $user = Auth::user();
        $this->email = $user->email;
        $this->username = $user->username;
        $this->image_path = $user->image_path;

        if ($user->image) {
            $this->imagePreview = $user->image;
        }

        $front_name = '';
        $back_name = '';

        if($user->hasRole('teacher')) {
            $front_name = $user->teacher->front_name;
            $back_name = $user->teacher->back_name;
        }else if($user->hasRole('participant')) {
            $front_name = $user->participant->front_name;
            $back_name = $user->participant->back_name;
        }

        $this->front_name = $front_name;
        $this->back_name = $back_name;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);

        $this->imagePreview = $this->image->temporaryUrl();
    }

    public function updateProfile()
    {
        $this->validate([
            'email' => 'required',
            'username' => 'required',
        ]);

        try {
            if ($this->image) {
                $this->image_path = $this->image->store('thumbnails', 'public');
                $this->image = url('storage/' . $this->image_path);
            } else {
                $this->image = $this->imagePreview;
            }

            $user = Auth::user();

            $user->update([
                'email' => $this->email,
                'username' => $this->username,
                'image' => $this->image,
                'image_path' => $this->image_path
            ]);

            $this->alert('success', 'Profile updated successfully');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.profile.user-account');
    }
}
