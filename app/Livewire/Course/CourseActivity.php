<?php

namespace App\Livewire\Course;

use App\Models\Course;
use App\Models\ParticipantActivity;
use App\Models\TypeTopic;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CourseActivity extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $course, $courseId, $start_date, $end_date, $type_topic_id;
    public $breadcrumbData;
    public $type_topics, $courses;

    public function mount($slug = null)
    {
        $this->courses = Course::query();

        if(Auth::user()->hasRole('teacher')) {
            $this->courses->where('teacher_id', Auth::user()->teacher->id);
        }

        $this->courses = $this->courses->get();

        $this->type_topics = TypeTopic::get();
        $this->course = Course::where('slug', $slug)->first();

        $this->breadcrumbData = [
            ['label' => 'Courses', 'url' => '/course'],
            ['label' => 'Course Activity ' . $this->course->title, 'url' => '/course-activity'],
        ];
    }

    public function render()
    {
        $course_activities = ParticipantActivity::with('participant', 'course', 'courseTopic')->whereHas('course', function () {
            return $this->course;
        })->paginate(12);

        // dd($course_activities);
        return view('livewire.course.course-activity', compact('course_activities'))->title(__('Course Activity '.$this->course->title))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData]);
    }
}
