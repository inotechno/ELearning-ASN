<?php

namespace App\Livewire\Course;

use Livewire\Component;

class CourseTeacher extends Component
{
    public $breadcrumbData = [
        ['label' => 'My Courses', 'url' => '/courses'],
    ];

    public function render()
    {
        return view('livewire.course.course-teacher')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData, 'title' => 'My Courses']););
    }
}
