<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\EducationMaster;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RegisterTeacher extends Component
{
    use LivewireAlert;
    public $step = 1;

    public $front_name, $back_name, $username, $email, $password, $password_confirmation;
    public $nik, $phone, $gender, $city, $country = 'Indonesia';
    public $education_id;
    public $educations;

    protected $rules = [
        'front_name' => 'required|string|max:255',
        'back_name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'nik' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'city' => 'required|string|max:255',
        'education_id' => 'required|exists:education_masters,id',
    ];

    public function mount()
    {
        $this->educations = EducationMaster::get();
    }

    public function increaseStep()
    {
        if ($this->step === 1) {
            $this->validate([
                'front_name'        => 'required',
                'back_name'         => 'required',
                'username'          => 'required|unique:users',
                'email'             => 'required|email|unique:users',
                'password'          => 'required|min:6|confirmed',
            ]);
        } elseif ($this->step === 2) {
            $this->validate([
                'nik'               => 'required',
                'phone'             => 'required',
                'gender'            => 'required',
                'city'              => 'required',
                'education_id'      => 'required',
            ]);
        }

        $this->step++;
    }

    public function decreaseStep()
    {
        $this->step--;
    }

    protected function resetForm()
    {
        $this->front_name = '';
        $this->back_name = '';
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->nik = '';
        $this->phone = '';
        $this->gender = '';
        $this->city = '';
        $this->education_id = null;
        $this->step = 1;
    }

    public function store()
    {
        $this->validate();

        try {
            $user = User::create([
                'username' => $this->username,
                'name' => $this->front_name . ' ' . $this->back_name,
                'email' => $this->email,
                'email_verified_at' => now(),
                'password' => bcrypt($this->password),
            ]);

            $user->assignRole('teacher');

            $teacher = $user->teacher()->create([
                'education_id' => $this->education_id,
                'front_name' => $this->front_name,
                'back_name' => $this->back_name,
                'nik' => $this->nik,
                'phone' => $this->phone,
                'city' => $this->city,
                'gender' => $this->gender,
            ]);

            $this->alert('success', 'Register Successfully, Silahkan Login !');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.auth.register-teacher')->title(__('Register Teacher'))->layout('layouts.auth');
    }
}
