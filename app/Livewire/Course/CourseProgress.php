<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class CourseProgress extends Component
{
    public $title;
    public $slug;
    public $course;
    public $course_id;

    public $breadcrumbData;

    public function mount($slug)
    {
        $this->course = Course::where('slug', $slug)->first();
        $this->course_id = $this->course->id;
        $this->title = $this->course->title;
        $this->slug = $this->course->slug;
        
        $this->breadcrumbData  = [
            ['label' => 'My Courses', 'url' => '/my-courses'],
            ['label' => $this->title, 'url' => `/my-courses/progress/$this->slug`],
        ];
    }

    public function render()
    {
        return view('livewire.course.course-progress')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => __('My Courses Progress')]);
    }
}
