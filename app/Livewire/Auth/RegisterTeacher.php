<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\EducationMaster;
use App\Models\InstitutionMaster;
use App\Models\RankMaster;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RegisterTeacher extends Component
{
    use LivewireAlert;
    public $step = 1;

    public $front_name, $back_name, $username, $email, $password, $password_confirmation;
    public $nik, $phone, $gender, $city, $country = 'Indonesia', $nip, $front_title, $back_title, $birth_place, $birth_date;
    public $institution_id, $education_id, $rank_id, $unit_name, $position;
    public $institutions, $educations, $ranks;

    protected $rules = [
        'front_name' => 'required|string|max:255',
        'back_name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'nik' => 'required|string|max:255',
        'nip' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'city' => 'required|string|max:255',
        'institution_id' => 'required|exists:institution_masters,id',
        'education_id' => 'required|exists:education_masters,id',
        'rank_id' => 'required|exists:rank_masters,id',
        'unit_name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'birth_place' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'front_title' => 'nullable|string|max:255',
        'back_title' => 'nullable|string|max:255',
        'country' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->educations = EducationMaster::get();
        $this->institutions = InstitutionMaster::get();
        $this->ranks = RankMaster::get();
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
                'birth_place'       => 'required',
                'birth_date'        => 'required',
                'front_title'       => 'nullable',
                'back_title'        => 'nullable',
                'nip'               => 'required',
            ]);
        } elseif ($this->step === 3) {
            $this->validate([
                'institution_id'    => 'required',
                'education_id'      => 'required',
                'rank_id'           => 'required',
                'unit_name'         => 'required',
                'position'          => 'required',
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
        $this->nip = '';
        $this->front_title = '';
        $this->back_title = '';
        $this->birth_place = '';
        $this->birth_date = '';
        $this->phone = '';
        $this->gender = '';
        $this->city = '';
        $this->institution_id = null;
        $this->education_id = null;
        $this->rank_id = null;
        $this->unit_name = '';
        $this->position = '';

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
                'status' => false
            ]);

            $user->assignRole('teacher');

            $teacher = $user->teacher()->create([
                'institution_id' => $this->institution_id,
                'education_id' => $this->education_id,
                'rank_id' => $this->rank_id,
                'front_name' => $this->front_name,
                'back_name' => $this->back_name,
                'nik' => $this->nik,
                'nip' => $this->nip,
                'birth_place' => $this->birth_place,
                'birth_date' => $this->birth_date,
                'front_title' => $this->front_title,
                'back_title' => $this->back_title,
                'phone' => $this->phone,
                'city' => $this->city,
                'gender' => $this->gender,
                'unit_name' => $this->unit_name,
                'position' => $this->position,
                'country' => $this->country,
            ]);

            $this->alert('success', 'Register Successfully, Silahkan tunggu validasi administrator !');
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
