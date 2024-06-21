<?php

namespace App\Livewire\Course;

use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\TypeCourse;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use LivewireAlert, WithPagination;

    public $categories, $types;

    public $breadcrumbData = [
        ['label' => 'Courses', 'url' => '/courses'],
    ];

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->categories = CategoryCourse::get();
        $this->types = TypeCourse::get();
    }
    
    public function render()
    {   
        $courses = Course::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        })->latest();

        if(Auth::user()->hasRole('administrator')) {
            $courses = $courses->paginate(10);
        } else if(Auth::user()->hasRole('teacher')) {
            $courses = $courses->where('created_by', Auth::user()->teacher->id)->paginate(10);
        }
        
        return view('livewire.course.course-index', compact('courses'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData])->title(__('Course'));
    }
}
