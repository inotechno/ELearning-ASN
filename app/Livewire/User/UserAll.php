<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserAll extends Component
{
    use WithPagination;
    public $search, $limit;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'search' => ['except' => ''],
        'refreshUserList' => '$refresh',
    ];

    public function mount()
    {
        $this->limit = 10;
    }

    public function render()
    {
        $users = User::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('username', 'like', '%' . $this->search . '%');
        })->paginate($this->limit, ['*'], 'usersAllPage');

        return view('livewire.user.user-all', compact('users'));
    }
}
