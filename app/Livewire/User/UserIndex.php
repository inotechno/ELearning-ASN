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
        'changeStatus' => 'changeStatus'
    ];

    public function changeStatusConfirm($id, $type)
    {
        $this->user_id = $id;
        $this->type = $type;

        $this->confirm('Are you sure you want to change the status?', [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'If yes, click the button below!',
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

    public function render()
    {
        return view('livewire.user.user-index')->layout('layouts.app', ['title' => 'Users', 'breadcrumbData' => $this->breadcrumbData]);
    }
}
