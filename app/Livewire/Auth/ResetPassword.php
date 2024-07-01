<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Request;

class ResetPassword extends Component
{
    use LivewireAlert;
    public $email;
    public $password;
    public $password_confirmation;
    public $token;

    public function mount($token)
    {
        $this->token = $token;
        $this->email = Request::get('email');

        // Retrieve the email from the password reset token
        // $resetRecord = DB::table('password_resets')->where('token', $token)->first();

        // if ($resetRecord) {
        //     $this->email = $resetRecord->email;
        // } else {
        //     $this->alert('error', 'Invalid token, please try again');
        // }
        
    }
    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|same:password_confirmation',
        ]);

        try {     
            $user = User::where('email', $this->email)->first();
            $user->password = bcrypt($this->password);
            $user->save();
            Auth::login($user);
            $this->alert('success', 'Password updated successfully');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong');
        }
    }
    public function render()
    {
        return view('livewire.auth.reset-password')->layout('layouts.auth', [
            'title' => 'Reset Password',
        ]);
    }
}
