<?php

namespace App\Livewire\Course;

use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\TypeCourse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use LivewireAlert, WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categories, $types, $courseId;

    public $breadcrumbData = [
        ['label' => 'Courses', 'url' => '/courses'],
    ];

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];
    protected $listeners = [
        'deleteCourse'
    ];

    public function mount()
    {
        $this->categories = CategoryCourse::get();
        $this->types = TypeCourse::get();
    }

    public function destroy($id)
    {
        $this->confirm('Are you sure you want to delete this course?', [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'If yes, click the button below!',
            'cancel' => true,
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'onConfirmed' => 'deleteCourse',
            'confirmButtonText' => 'Yes, Delete it!',
            'confirmButtonColor' => '#d33',
            'cancelButtonColor' => '#3085d6'
        ]);

        $this->courseId = $id;
    }

    public function deleteCourse()
    {
        try {
            $course = Course::find($this->courseId);
            $course->deleted_by = Auth::user()->id;
            $course->save();
            $course->delete();
            $this->alert('success', 'Course has been deleted');
        } catch (\Throwable $th) {
            $this->alert('error', 'Course has not been deleted');
        }
    }

    public function render()
    {
        $now =  Carbon::now();
        $courses = Course::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        })->latest();

        // dd(Auth::user()->hasRole('teacher'));
        if (Auth::user()->hasRole('administrator')) {
            $courses = $courses->paginate(6);
        } else if (Auth::user()->hasRole('teacher')) {
            $courses = $courses->where('teacher_id', Auth::user()->teacher->id)->paginate(6);
        } else {
            $courses = $courses->whereDate('implementation_start', '<=', $now)
                ->whereDate('implementation_end', '>=', $now)
                ->where('deleted_at', null)->paginate(6);
        }


        // dd($courses);
        return view('livewire.course.course-index', compact('courses'))->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData])->title(__('Course'));
    }
}
