<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PersonalData extends Component
{
    use LivewireAlert;

    public $user, $user_id, $front_name, $back_name, $front_title, $back_title, $nik, $birth_place, $birth_date, $gender, $city, $country = 'Indonesia', $address, $phone, $role;
    public $editUserByAdmin  = false;
    public function mount($id = null)
    {
        if ($id == null) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
            $this->editUserByAdmin = true;
        }

        $this->user = $user;
        $this->user_id = $user->id;

        if ($user->hasRole('participant')) {
            $this->role = $user->participant;
        } else if ($user->hasRole('teacher')) {
            $this->role = $user->teacher;
        }

        $this->user_id = $this->role->user_id;
        $this->front_name = $this->role->front_name;
        $this->back_name = $this->role->back_name;
        $this->front_title = $this->role->front_title;
        $this->back_title = $this->role->back_title;
        $this->nik = $this->role->nik;
        $this->birth_place = $this->role->birth_place;
        $this->birth_date = $this->role->birth_date;
        $this->gender = $this->role->gender;
        $this->city = $this->role->city;
        $this->address = $this->role->address;
        $this->phone = $this->role->phone;
    }

    public function updatePersonalData()
    {
        $this->validate([
            'front_name' => 'required',
            'back_name' => 'required',
            'front_title' => 'nullable',
            'back_title' => 'nullable',
            'nik' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        try {
            $this->role->update([
                'front_name' => $this->front_name,
                'back_name' => $this->back_name,
                'front_title' => $this->front_title,
                'back_title' => $this->back_title,
                'nik' => $this->nik,
                'birth_place' => $this->birth_place,
                'birth_date' => $this->birth_date,
                'gender' => $this->gender,
                'city' => $this->city,
                'address' => $this->address,
                'phone' => $this->phone,
            ]);

            $this->user->update([
                'name' => $this->front_name . ' ' . $this->back_name
            ]);

            $this->alert('success', 'Personal Data Updated Successfully');
        } catch (\Throwable $th) {
            $this->alert('error', $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.profile.personal-data');
    }
}
