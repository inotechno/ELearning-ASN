<?php

namespace App\Livewire\Profile;

use App\Models\EducationMaster;
use App\Models\InstitutionMaster;
use App\Models\RankMaster;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PersonnelData extends Component
{
    use LivewireAlert;

    public $user, $institution_id, $education_id, $rank_id, $position, $unit_name, $role, $nip;
    public $educations, $institutions, $ranks;

    public function mount($id = null)
    {
        $this->educations = EducationMaster::get();
        $this->institutions = InstitutionMaster::get();
        $this->ranks = RankMaster::get();

        if ($id == null) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
        }

        $this->user = $user;

        if ($user->hasRole('participant')) {
            $this->role = $user->participant;
        } else if ($user->hasRole('teacher')) {
            $this->role = $user->teacher;
        }

        $this->nip = $this->role->nip;
        $this->institution_id = $this->role->institution_id;
        $this->education_id = $this->role->education_id;
        $this->rank_id = $this->role->rank_id;
        $this->position = $this->role->position;
        $this->unit_name = $this->role->unit_name;
    }

    public function updatePersonnelData()
    {
        $this->validate([
            'nip' => 'required',
            'institution_id' => 'required',
            'education_id' => 'required',
            'rank_id' => 'required',
            'position' => 'required',
            'unit_name' => 'required'
        ]);

        try {
            $this->role->update([
                'nip' => $this->nip,
                'institution_id' => $this->institution_id,
                'education_id' => $this->education_id,
                'rank_id' => $this->rank_id,
                'position' => $this->position,
                'unit_name' => $this->unit_name
            ]);

            $this->alert('success', 'Personnel Data Updated Successfully');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.profile.personnel-data');
    }
}
