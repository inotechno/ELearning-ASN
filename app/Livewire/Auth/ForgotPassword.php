<?php

namespace App\Livewire\Auth;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    use LivewireAlert;

    public $email;

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        try {
            $status = Password::sendResetLink(['email' => $this->email]);
            
            if($status === Password::RESET_LINK_SENT){
                $this->alert('success', 'We have e-mailed your password reset link!');
            }else{
                $this->alert('error', $status);
            }
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('layouts.auth', [
            'title' => 'Forgot Password',
        ]);
    }
}
