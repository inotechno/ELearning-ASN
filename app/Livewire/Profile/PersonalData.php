<?php

namespace App\Livewire\Profile;


use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PersonalData extends Component
{
    use LivewireAlert;

    public $user, $user_id, $front_name, $back_name, $front_title, $back_title, $nik, $birth_place, $birth_date, $gender, $city, $country = 'Indonesia', $address, $phone;

    public function mount()
    {
        $user = Auth::user();
        $this->user_id = $user->id;

        if ($user->hasRole('participant')) {
            $this->user = $user->participant;
        } else if ($user->hasRole('teacher')) {
            $this->user = $user->teacher;
        }

        $this->user_id = $this->user->user_id;
        $this->front_name = $this->user->front_name;
        $this->back_name = $this->user->back_name;
        $this->front_title = $this->user->front_title;
        $this->back_title = $this->user->back_title;
        $this->nik = $this->user->nik;
        $this->birth_place = $this->user->birth_place;
        $this->birth_date = $this->user->birth_date;
        $this->gender = $this->user->gender;
        $this->city = $this->user->city;
        $this->address = $this->user->address;
        $this->phone = $this->user->phone;
    }

    public function updatePersonalData()
    {
        $this->validate([
            'front_name' => 'required',
            'back_name' => 'required',
            'front_title' => 'required',
            'back_title' => 'required',
            'nik' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        try {
            $this->user->participant->update([
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
