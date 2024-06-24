<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class CourseDetail extends Component
{
    public $course;
    public $courseId;
    public $slug;
    public $img_thumbnail;
    public $title;
    public $description;
    public $description_short;
    public $implementation_start;
    public $implementation_end;
    public $is_active = true;
    public $previewThumbnail;
    public $img_thumbnail_path;
    public $category_id;
    public $type_id;
    public $teacher_id;
    public $created_by;
    public $created_at;

    // Course Topic Variabel
    public $topics = [];

    // Data Variabel
    public $categories, $types, $teachers = [];

    protected $listeners = ['topicsUpdated' => 'setTopics'];

    public $breadcrumbData;

    public function mount($slug)
    {
        $course = Course::where('slug', $slug)->first();

        $this->course = $course;
        $this->courseId = $course->id;
        $this->title = $course->title;
        $this->category_id = $course->category_id;
        $this->type_id = $course->type_id;
        $this->teacher_id = $course->teacher_id;
        $this->description_short = $course->description_short;
        $this->description = $course->description;
        $this->implementation_start = $course->implementation_start;
        $this->implementation_end = $course->implementation_end;
        $this->is_active = $course->is_active;
        $this->img_thumbnail = $course->img_thumbnail;
        $this->img_thumbnail_path = $course->img_thumbnail_path;
        $this->previewThumbnail = $course->img_thumbnail;
        $this->created_by = $course->created_by;
        $this->created_at = $course->created_at;

        $this->topics = $course->topics->where('status', 'progress');
        // dd($this->topics);
        // $this->categories = \App\Models\CategoryCourse::get();
        // $this->types = \App\Models\TypeCourse::get();
        // $this->teachers = \App\Models\Teacher::get();

        $this->breadcrumbData  = [
            ['label' => 'Courses', 'url' => '/courses'],
            ['label' => $this->title, 'url' => `/courses/$this->slug`],
        ];
    }

    public function render()
    {
        return view('livewire.course.course-detail')->title($this->title)->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData]);
    }
}
