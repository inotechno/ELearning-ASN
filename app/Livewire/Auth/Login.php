<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    public $username, $password;
    public $remember = false;

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        try {
            if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
                $this->alert('success', 'Login Berhasil, Selamat Datang');
                return redirect()->route('dashboard');
            } 
            
            $this->alert('error', 'Login Gagal, Silahkan Coba Lagi');
            return back();
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
            return back();
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
