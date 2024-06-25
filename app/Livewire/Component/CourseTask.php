<?php

namespace App\Livewire\Component;

use App\Models\CourseTopic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseTask extends Component
{
    public $course;
    public $courseTopics;

    public function mount($course)
    {
        $this->course = $course;
        $courseTopics = CourseTopic::where('course_id', $this->course->id)
            ->with('activities')
            ->whereHas('activities', function($query){
                return $query->where('participant_id', Auth::user()->participant->id);
            })
            ->orderBy('start_at')
            ->get();

        $this->courseTopics = [];

        foreach ($courseTopics as $key => $topic) {
            $date = Carbon::parse($topic->start_at)->format('D, d M Y');
            $success = $topic->activities->isNotEmpty();
            $activities = $topic->activities;

            $this->courseTopics[$date][] = [
                'id' => $topic->id,
                'course_id' => $topic->course_id,
                'type_topic_id' => $topic->type_topic_id,
                'title' => $topic->title,
                'slug' => $topic->slug,
                'description' => $topic->description,
                'start_at' => $topic->start_at,
                'end_at' => $topic->end_at,
                'status' => $topic->status,
                'created_at' => $topic->created_at,
                'updated_at' => $topic->updated_at,
                'success' => $success,
                'activities' => $activities
            ];

        }
        // dd($this->courseTopics);
    }

    public function render()
    {
        return view('livewire.component.course-task', ['courseTopics' => $this->courseTopics]);
    }
}
