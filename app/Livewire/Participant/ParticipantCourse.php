<?php

namespace App\Livewire\Participant;

use App\Exports\ParticipantsCoursesExport;
use App\Models\Course;
use App\Models\CourseTopic;
use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantCourse extends Component
{
    use WithPagination;

    public $search;
    public $courses, $course_topics, $course_id, $course_topic_id, $start_date, $end_date, $participants;

    public $page = 12;

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
        $participants_courses = $this->loadParticipantsCourses()->paginate($this->page);
        $participants_courses = $this->transformCollection($participants_courses);
        // dd($participants_courses);

        return Excel::download(new ParticipantsCoursesExport($participants_courses), 'participants-courses.xlsx');
    }

    private function getQualification($score)
    {
        if ($score > 90) {
            return 'Sangat Baik';
        } elseif ($score >= 80) {
            return 'Baik';
        } else {
            return 'Tidak Ada';
        }
    }

    public function render()
    {
        $participants_courses = $this->loadParticipantsCourses()->paginate($this->page);
        $participants_courses = $this->transformCollection($participants_courses);

        // $this->participants = $participants_courses;
        // dd($participants_courses);
        return view('livewire.participant.participant-course', compact('participants_courses'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => 'Participants Courses']);
    }

    public function loadParticipantsCourses()
    {
        $participants_courses = Participant::whereHas('courses', function ($q) {
            $q->when($this->course_id, function ($q) {
                $q->where('courses.id', $this->course_id);
            });
        })->when($this->search, function ($query) {
            $query->where('front_name', 'like', '%' . $this->search . '%')
                ->orWhere('back_name', 'like', '%' . $this->search . '%');
        })->with(['courses' => function ($q) {
            $q->when($this->course_id, function ($q) {
                $q->where('courses.id', $this->course_id);
            });
        }, 'activities.courseTopic'])
            ->when($this->start_date, function ($q) {
                return $q->whereHas('courses', function ($q) {
                    $q->where('participants_courses.created_at', '>=', $this->start_date);
                });
            })
            ->when($this->end_date, function ($q) {
                return $q->whereHas('courses', function ($q) {
                    $q->where('participants_courses.created_at', '<=', $this->end_date);
                });
            });

        return $participants_courses;
    }

    public function transformCollection($participants_courses)
    {
        $participants_courses->getCollection()->transform(function ($participant) {
            $participant->courses->transform(function ($course) use ($participant) {
                $course->total_score = $participant->activities->where('course_id', $course->id)->sum('progress');
                $course->qualification = $this->getQualification($course->total_score);
                return $course;
            });
            return $participant;
        });

        return $participants_courses;
    }
}
