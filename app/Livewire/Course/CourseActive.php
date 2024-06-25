<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CourseActive extends Component
{
    use LivewireAlert;
    public $search;

    public $breadcrumbData = [
        ['label' => 'Courses', 'url' => '/course'],
        ['label' => 'Course Active', 'url' => '/course-active'],
    ];

    public function render()
    {
        $today = Carbon::today();

        $courses = Course::when($this->search, function ($query) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        })->where(function ($query) use ($today) {
            $query->whereDate('implementation_start', '<=', $today)
                ->whereDate('implementation_end', '>=', $today);
        })->latest()
            ->where('teacher_id', Auth::user()->teacher->id)
            ->get();

        return view('livewire.course.course-active', compact('courses'))->title(__('Course Active'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData]);
    }
}
