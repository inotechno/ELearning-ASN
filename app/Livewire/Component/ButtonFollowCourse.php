<?php

namespace App\Livewire\Component;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ButtonFollowCourse extends Component
{
    use LivewireAlert;
    public $course_id;
    public $exists_participants = false;

    protected $listeners = [
        'followCourse'
    ];

    public function mount($id)
    {
        $this->exists_participants = Course::find($id)->participants()->where('participant_id', Auth::user()->participant->id)->exists();
        $this->course_id = $id;
    }

    public function follow()
    {
        $this->confirm('Are you sure you want to follow this course?', [
            'icon' => 'info',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'If yes, click the button below!',
            'cancel' => true,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'onConfirmed' => 'followCourse',
            'confirmButtonText' => 'Yes, Follow it!',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
        ]);
    }

    public function followCourse()
    {
        $this->validate([
            'course_id' => 'required'
        ]);

        try {
            $course = Course::find($this->course_id);
            $course->participants()->attach(Auth::user()->participant->id, ['created_at' => now()]);
            $this->alert('success', 'Course has been followed');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.component.button-follow-course');
    }
}
