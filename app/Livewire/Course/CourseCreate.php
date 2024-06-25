<?php

namespace App\Livewire\Course;

use App\Livewire\Component\Quill;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Joelwmale\LivewireQuill\Traits\HasQuillEditor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CourseCreate extends Component
{
    use WithFileUploads, LivewireAlert, HasQuillEditor;

    // Course Variabel
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

    // Course Topic Variabel
    public $topics = [];

    // Data Variabel
    public $categories, $types, $teachers = [];

    protected $listeners = ['topicsUpdated' => 'setTopics'];

    public $breadcrumbData = [
        ['label' => 'Courses', 'url' => '/courses'],
        ['label' => 'Create Courses', 'url' => '/courses/create'],
    ];

    protected $rules = [
        'title' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'type_id' => 'required|integer',
        'description_short' => 'required|string|max:255',
        'description' => 'required|string',
        'implementation_start' => 'required|date',
        'implementation_end' => 'required|date|after_or_equal:implementation_start',
        'is_active' => 'boolean',
        'img_thumbnail' => 'required|image|max:1024',
        'topics.*.status' => 'required|string',
        'topics.*.title' => 'required|string|max:255',
        'topics.*.start_at' => 'required|date',
        'topics.*.end_at' => 'required|date|after_or_equal:topics.*.start_at',
        'topics.*.type_topic_id' => 'nullable',
        'topics.*.percentage_value' => 'required|integer|min:1|max:100',
        'topics.*.description' => 'required|string',
        'topics.*.video_url' => 'nullable|required_if:topics.*.type_topic_id,1|url',
        'topics.*.document_path' => 'nullable|required_if:topics.*.type_topic_id,2|file|mimes:pdf,doc,docx|max:2048',
        'topics.*.zoom_url' => 'nullable|required_if:topics.*.type_topic_id,3|url',
    ];

    public function mount()
    {
        $this->categories = \App\Models\CategoryCourse::get();
        $this->types = \App\Models\TypeCourse::get();
        $this->teachers = \App\Models\Teacher::get();

        if (Auth::user()->hasRole('teacher')) {
            $this->teacher_id = Auth::user()->teacher->id;
        }
    }

    public function setTopics($topics)
    {
        $this->topics = $topics;
    }

    public function updatedImgThumbnail()
    {
        $this->validate([
            'img_thumbnail' => 'image|max:1024', // Validasi untuk gambar maksimal 1MB
        ]);

        $this->previewThumbnail = $this->img_thumbnail->temporaryUrl();
    }

    public function contentChanged($editorId, $content)
    {
        $this->description = $content;
    }

    public function store()
    {
        // dd($this->validate());
        $this->validate();

        try {
            if ($this->img_thumbnail) {
                $this->img_thumbnail_path = $this->img_thumbnail->store('thumbnails', 'public');
                $this->img_thumbnail = url('storage/' . $this->img_thumbnail_path);
            }

            $course = Course::create([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'category_id' => $this->category_id,
                'type_id' => $this->type_id,
                'teacher_id' => $this->teacher_id,
                'description_short' => $this->description_short,
                'description' => $this->description,
                'implementation_start' => $this->implementation_start,
                'implementation_end' => $this->implementation_end,
                'is_active' => $this->is_active,
                'img_thumbnail' => $this->img_thumbnail,
                'img_thumbnail_path' => $this->img_thumbnail_path,
                'created_by' => Auth::user()->id,
            ]);

            foreach ($this->topics as $topic) {
                if (isset($topic['document_path']) && is_object($topic['document_path'])) {
                    $topic['document_path'] = $topic['document_path']->store('documents', 'public');
                    $topic['document_url'] = url('storage/' . $topic['document_path']);
                }

                $topic['created_by'] = Auth::user()->id;
                $topic['slug'] = Str::slug($topic['title']);
                $course->topics()->create($topic);
            }

            $this->alert('success', 'Course has been created');
            return redirect()->route('courses');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.course.course-create')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData])->title(__('Create Course'));
    }
}
