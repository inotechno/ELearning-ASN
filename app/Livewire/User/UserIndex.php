<?php

namespace App\Livewire\User;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UserIndex extends Component
{
    use LivewireAlert;
    public $user_id, $status, $type;

    public $breadcrumbData = [
        ['label' => 'Users', 'url' => '/users'],
    ];

    protected $listeners = [
        'changeStatusConfirm' => 'changeStatusConfirm',
        'confirmDelete' => 'confirmDelete',
        'changeStatus' => 'changeStatus',
        'deleteUser' => 'deleteUser',
    ];

    public function changeStatusConfirm($id, $type)
    {
        $this->user_id = $id;
        $this->type = $type;

        $this->confirm('Apakah anda yakin ingin mengganti status?', [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'Jika ya, Klik tombol dibawah!',
            'cancel' => true,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'onConfirmed' => 'changeStatus',
            'confirmButtonText' => 'Yes, Change it!',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
        ]);
    }

    public function changeStatus()
    {
        // dd($this->user_id, $this->status);

        $this->validate([
            'user_id' => 'required',
        ]);

        try {
            $user = User::find($this->user_id);

            $this->status = $user->status ? 0 : 1;

            $user->update([
                'status' => $this->status
            ]);

            $this->alert('success', 'User status successfully changed');

            $this->dispatch('refreshUserList');
            // if($this->type == 'all'){
            // } else if($this->type == 'participant'){
            //     $this->dispatch('refreshUserListParticipant');
            // }else if($this->type == 'teacher'){
            //     $this->dispatch('refreshUserListTeacher');
            // }
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function confirmDelete($id)
    {
        $this->user_id = $id;

        $this->confirm('Apakah anda yakin ingin menghapus data user?', [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'Jika ya, Klik tombol dibawah!',
            'cancel' => true,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'onConfirmed' => 'deleteUser',
            'confirmButtonText' => 'Yes, Delete it!',
            'confirmButtonColor' => '#d33',
            'cancelButtonColor' => '#3085d6'
        ]);
    }

    public function deleteUser()
    {
        try {
            $user = User::find($this->user_id);
            $user->delete();
            $this->alert('success', 'User has been deleted');

            $this->dispatch('refreshUserList');
        } catch (\Throwable $th) {
            $this->alert('error', 'User has not been deleted');
        }
    }

    public function render()
    {
        return view('livewire.user.user-index')->layout('layouts.app', ['title' => 'Users', 'breadcrumbData' => $this->breadcrumbData]);
    }
}
