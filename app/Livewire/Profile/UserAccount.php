<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserAccount extends Component
{
    use WithFileUploads, LivewireAlert;

    public $name, $front_name, $back_name, $email, $image, $username, $imagePreview, $image_path, $user;

    public function mount($id = null)
    {
        if ($id == null) {
            $this->user = Auth::user();
        } else {
            $this->user = User::find($id);
        }

        $this->email = $this->user->email;
        $this->username = $this->user->username;
        $this->image_path = $this->user->image_path;

        if ($this->user->image) {
            $this->imagePreview = $this->user->image;
        }

        $front_name = '';
        $back_name = '';

        if ($this->user->hasRole('teacher')) {
            $front_name = $this->user->teacher->front_name;
            $back_name = $this->user->teacher->back_name;
        } else if ($this->user->hasRole('participant')) {
            $front_name = $this->user->participant->front_name;
            $back_name = $this->user->participant->back_name;
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

            $this->user->update([
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
