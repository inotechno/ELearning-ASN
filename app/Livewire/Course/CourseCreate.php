<?php

namespace App\Livewire\Course;

use App\Livewire\Component\Quill;
use App\Models\Course;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Joelwmale\LivewireQuill\Traits\HasQuillEditor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CourseCreate extends Component
{
    use WithFileUploads, LivewireAlert, HasQuillEditor;

    // Global Variabel
    public $search = '';

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
        'description_short' => 'required|string',
        'description' => 'required|string',
        'implementation_start' => 'required|date',
        'implementation_end' => 'required|date|after_or_equal:implementation_start',
        'is_active' => 'boolean',
        'img_thumbnail' => 'required|image|max:1024',
        'topics.*.status' => 'required|string',
        'topics.*.title' => 'required|string|max:255',
        'topics.*.start_at' => 'required|date',
        'topics.*.end_at' => 'required|date|after_or_equal:topics.*.start_at',
        'topics.*.type_topic_id' => 'required|exists:type_topics,id',
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
        
        try {
            $this->validate();
            if ($this->img_thumbnail) {
                $this->img_thumbnail_path = $this->img_thumbnail->store('thumbnails');
                $this->img_thumbnail = url('storage/' . $this->img_thumbnail_path);
            }

            $course = Course::create([
                'title' => $this->title,
                'description_short' => $this->description_short,
                'description' => $this->description,
                'implementation_start' => $this->implementation_start,
                'implementation_end' => $this->implementation_end,
                'is_active' => $this->is_active,
                'img_thumbnail' => $this->img_thumbnail,
                'img_thumbnail_path' => $this->img_thumbnail_path,
                'created_by' => auth()->id(),
            ]);

            foreach ($this->topics as $topic) {
                if (isset($topic['document_path']) && is_object($topic['document_path'])) {
                    $topic['document_path'] = $topic['document_path']->store('documents');
                    $topic['document_url'] = url('storage/' . $topic['document_path']);
                }

                $topic['slug'] = Str::slug($topic['title']);
                $course->topics()->create($topic);
            }

            $this->alert('success', 'Course has been created');
            return redirect()->route('courses');
        } catch (\Exception $e) {
            dd($e);
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.course.course-create')->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData])->title(__('Create Course'));
    }
}
