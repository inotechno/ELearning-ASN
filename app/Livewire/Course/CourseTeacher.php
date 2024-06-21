<?php

namespace App\Livewire\Course;

use Livewire\Component;

class CourseTeacher extends Component
{
    public $breadcrumbData = [
        ['label' => 'My Courses', 'url' => '/my-courses'],
    ];

    public function render()
    {
        return view('livewire.course.course-teacher')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData])->title(__('My Course'));
    }
}
