<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseParticipant extends Component
{
    public $search;

    public $breadcrumbData = [
        ['label' => 'My Course', 'url' => '/my-course'],
    ];

    public function render()
    {
        // $today = Carbon::today();
        $participantId = Auth::user()->participant->id;

        $courses = Course::when($this->search, function ($query) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        })->whereHas('participants', function ($query) use ($participantId) {
            $query->where('participant_id', $participantId);
        })->with([
                    'activities' => function ($query) use ($participantId) {
                        $query->where('participant_id', $participantId);
                    }
                ])->latest()->paginate(12);

        $courses->getCollection()->transform(function ($course) {
            $inactive = false;
            if ($course->implementation_end <= date('Y-m-d')) {
                $inactive = true;
            }

            $course->inactive = $inactive;
            $course->total_progress = $course->activities->sum('progress');
            return $course;
        });

        // dd($courses);
        return view('livewire.course.course-participant', compact('courses'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => __('My Courses')]);
    }
}
