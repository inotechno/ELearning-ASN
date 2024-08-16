<?php

namespace App\Livewire\Course;

use App\Exports\ParticipantActivityExport;
use App\Models\Course;
use App\Models\ParticipantActivity;
use App\Models\TypeTopic;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class CourseActivity extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $course, $courseId, $course_topics, $course_topic_id, $start_date, $end_date, $type_topic_id, $search;
    public $breadcrumbData;
    public $type_topics;

    public $activities;

    protected $queryString = [
        'search' => ['except' => ''],
        'type_topic_id' => ['except' => ''],
        'course_topic_id' => ['except' => ''],
        'start_date' => ['except' => ''],
        'end_date' => ['except' => ''],
    ];

    public function mount($slug = null)
    {
        $this->type_topics = TypeTopic::get();
        $this->course = Course::with('topics')->where('slug', $slug)->first();
        $this->course_topics = $this->course->topics;
        $this->courseId = $this->course->id;

        $this->breadcrumbData = [
            ['label' => 'Courses', 'url' => '/course'],
            ['label' => 'Course Activity ' . $this->course->title, 'url' => '/course-activity'],
        ];
    }

    public function resetFormFields()
    {
        $this->course_topic_id = "";
        $this->start_date = "";
        $this->end_date = "";
        $this->type_topic_id = "";
        $this->search = "";
    }

    public function exportExcel()
    {
        // dd($this->activities);
        return Excel::download(new ParticipantActivityExport($this->activities), 'participant-activity.xlsx');
    }

    public function render()
    {
        $course_activities = ParticipantActivity::when($this->type_topic_id, function ($query) {
            $query->whereHas('courseTopic', function ($query) {
                $query->where('type_topic_id', $this->type_topic_id);
            });
        })->when($this->search, function ($query) {
            $query->whereHas('participant', function ($query) {
                $query->where('front_name', 'like', '%' . $this->search . '%')->orWhere('back_name', 'like', '%' . $this->search . '%');
            });
        })->when($this->course_topic_id, function ($query) {
            $query->where('course_topic_id', $this->course_topic_id);
        })->when($this->start_date && $this->end_date, function ($query) {
            $query->whereHas('courseTopic', function ($query) {
                $query->whereBetween('start_at', [$this->start_date, $this->end_date])
                    ->orWhereBetween('end_at', [$this->start_date, $this->end_date]);
            });
        })->with('participant', 'course', 'courseTopic')->whereHas('course', function () {
            return $this->course;
        })->where('course_id', $this->courseId)->latest();

        $this->activities = $course_activities->get();
        $course_activities = $course_activities->paginate(10);
        // dd($this->activities);
        // dd($course_activities);
        return view('livewire.course.course-activity', compact('course_activities'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => __('Course Activity ' . $this->course->title)]);
    }
}
