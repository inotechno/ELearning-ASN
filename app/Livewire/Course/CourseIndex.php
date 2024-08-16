<?php

namespace App\Livewire\Course;

use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\LearningMaterial;
use App\Models\TypeCourse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use LivewireAlert, WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $categories, $types, $courseId, $type_id, $category_id;
    public $course, $course_topic_id, $materi, $topics, $title, $description;

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

    public function resetFilter()
    {
        $this->category_id = "";
        $this->type_id = "";
    }

    public function getCourse($id)
    {
        $this->course = Course::with(['topics' => function($query){
            $query->where('status', '!=', 'begin');
        }])->find($id);
        $this->topics = $this->course->topics->filter(function($topic) {
            return $topic->material->isEmpty();
        });
        $this->dispatch('openModal');
    }

    public function uploadMateri()
    {
        $this->validate([
            'course_topic_id' => 'required',
            'materi' => 'required|mimes:pdf,doc,docx|max:2048',
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $file = $this->materi->store('documents', 'public');

        LearningMaterial::create([
            'course_topic_id' => $this->course_topic_id,
            'title' => $this->title,
            'description' => $this->description,
            'file_path' => $file,
            'file_url' => url('storage/' . $file),
            'file_type' => $this->materi->extension(),
            'file_size' => $this->materi->getSize(),
            'file_mime' => $this->materi->getMimeType(),
        ]);

        $this->materi = null;
        $this->alert('success', 'Materi has been added');
        $this->dispatch('closeModal');

        redirect(route('courses'));
    }

    public function destroy($id)
    {
        $this->confirm('Apakah anda yakin ingin menghapus pelatihan ini?', [
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'text' => 'Jika ya, Klik tombol dibawah!',
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
        })->when($this->category_id, function($query) {
            $query->where('category_id', $this->category_id);
        })->when($this->type_id, function($query){
            $query->where('type_id', $this->type_id);
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
