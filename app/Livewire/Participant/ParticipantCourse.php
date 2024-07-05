<?php

namespace App\Livewire\Participant;

use App\Exports\ParticipantsCoursesExport;
use App\Models\Course;
use App\Models\CourseTopic;
use App\Models\Participant;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantCourse extends Component
{
    public $search;
    public $courses, $course_topics, $course_id, $course_topic_id, $start_date, $end_date, $participants;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public $breadcrumbData = [
        ['label' => 'Participants Courses', 'url' => '/participants-courses'],
    ];

    public function mount()
    {
        $this->courses = Course::get();
        $this->course_topics = CourseTopic::get();
    }

    public function resetFormFields()
    {
        $this->course_id = "";
        $this->course_topic_id = "";
        $this->start_date = "";
        $this->end_date = "";
        $this->search = "";
    }

    public function exportExcel()
    {
        return Excel::download(new ParticipantsCoursesExport($this->participants), 'participants-courses.xlsx');
    }

    public function render()
    {
        $participants_courses = Participant::whereHas('courses')->with('courses.topics', 'institution');

        // Filter by course_id using when
        $participants_courses->when($this->course_id, function ($q) {
            return $q->whereHas('courses', function ($q) {
                $q->where('courses.id', $this->course_id);
            });
        });

        // Search by course title using when
        $participants_courses->when($this->search, function ($q) {
            return $q->whereHas('courses', function ($q) {
                $q->where('courses.title', 'like', '%' . $this->search . '%');
            });
        });

        // Filter by course_topic_id using when
        $participants_courses->when($this->course_topic_id, function ($q) {
            return $q->whereHas('courses.topics', function ($q) {
                $q->where('course_topics.id', $this->course_topic_id);
            });
        });

        $participants_courses->when($this->start_date, function ($q) {
            return $q->whereHas('courses', function ($q) {
                $q->where('participants_courses.created_at', '>=', $this->start_date);
            });
        });

        $participants_courses->when($this->end_date, function ($q) {
            return $q->whereHas('courses', function ($q) {
                $q->where('participants_courses.created_at', '<=', $this->end_date);
            });
        });

        $this->participants = $participants_courses->get();
        $participants_courses = $participants_courses->paginate(12);
        // dd($participants_courses);
        return view('livewire.participant.participant-course', compact('participants_courses'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => 'Participants Courses']);
    }
}
