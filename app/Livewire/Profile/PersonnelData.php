<?php

namespace App\Livewire\Profile;

use App\Models\EducationMaster;
use App\Models\InstitutionMaster;
use App\Models\RankMaster;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PersonnelData extends Component
{
    use LivewireAlert;

    public $user, $institution_id, $education_id, $rank_id, $position, $unit_name;
    public $educations, $institutions, $ranks;

    public function mount()
    {
        $this->educations = EducationMaster::get();
        $this->institutions = InstitutionMaster::get();
        $this->ranks = RankMaster::get();
        $user = Auth::user();

        if($user->hasRole('participant')) {
            $this->user = $user->participant;
        }else if($user->hasRole('teacher')) {
            $this->user = $user->teacher;
        }

        $this->institution_id = $this->user->institution_id;
        $this->education_id = $this->user->education_id;
        $this->rank_id = $this->user->rank_id;
        $this->position = $this->user->position;
        $this->unit_name = $this->user->unit_name;
    }

    public function updatePersonnelData()
    {
        $this->validate([
            'institution_id' => 'required',
            'education_id' => 'required',
            'rank_id' => 'required',
            'position' => 'required',
            'unit_name' => 'required'
        ]);

        try {
            $this->user->update([
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
