<?php

namespace App\Livewire\Component;

use App\Models\Course;
use App\Models\ParticipantActivity;
use Livewire\Component;

class CourseActivityPercentage extends Component
{
    public $course, $course_id, $participants = [];

    public function mount($course_id)
    {
        $this->course_id = $course_id;
        $this->course = Course::find($course_id);
        $this->fetchParticipants();
        // dd($this->course);
    }

    public function fetchParticipants()
    {
        $this->participants = $this->course->activities
            ->groupBy('participant_id')
            ->map(function ($activities) {
                $qualification = "";
                $progress = $activities->sum('progress');
                if($progress == 100){
                    $qualification = "Sangat Baik";
                }else if($progress >= 80){
                    $qualification = "Baik";
                }

                $participant = $activities->first()->participant;
                return [
                    'name' => $participant->front_name . ' ' . $participant->back_name,
                    'total_progress' => $progress,
                    'qualification' => $qualification
                ];
            });

        // dd($this->participants);
    }

    public function render()
    {
        return view('livewire.component.course-activity-percentage');
    }
}
