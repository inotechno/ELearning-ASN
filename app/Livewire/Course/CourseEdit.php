<?php

namespace App\Livewire\Course;

use App\Models\Course;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\TypeCourse;
use Illuminate\Support\Str;
use App\Models\CategoryCourse;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Joelwmale\LivewireQuill\Traits\HasQuillEditor;
use Livewire\WithFileUploads;

class CourseEdit extends Component
{
    use WithFileUploads, LivewireAlert, HasQuillEditor;

    // Course Variabel
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

    // Course Topic Variabel
    public $topics = [];

    // Data Variabel
    public $categories, $types, $teachers = [];

    protected $listeners = ['topicsUpdated' => 'setTopics'];

    public $breadcrumbData;

    protected $rules = [
        'title' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'type_id' => 'required|integer',
        'description_short' => 'required|string',
        'description' => 'required|string',
        'implementation_start' => 'required|date',
        'implementation_end' => 'required|date|after_or_equal:implementation_start',
        'is_active' => 'boolean',
        'img_thumbnail' => 'nullable|image|max:1024',
        'topics.*.status' => 'required|string',
        'topics.*.title' => 'required|string|max:255',
        'topics.*.start_at' => 'required|date',
        'topics.*.end_at' => 'required|date|after_or_equal:topics.*.start_at',
        'topics.*.type_topic_id' => 'nullable',
        'topics.*.percentage_value' => 'required|min:1|max:100',
        'topics.*.description' => 'required|string',
        'topics.*.video_url' => 'nullable|required_if:topics.*.type_topic_id,1|url',
        'topics.*.document_path' => 'nullable|required_if:topics.*.type_topic_id,2|file|mimes:pdf,doc,docx|max:2048',
        'topics.*.zoom_url' => 'nullable|required_if:topics.*.type_topic_id,3|url',
    ];

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
        $this->img_thumbnail_path = $course->img_thumbnail_path;
        $this->previewThumbnail = $course->img_thumbnail;
        $this->topics = $course->topics->toArray();

        $this->categories = \App\Models\CategoryCourse::get();
        $this->types = \App\Models\TypeCourse::get();
        $this->teachers = \App\Models\Teacher::get();

        $this->breadcrumbData  = [
            ['label' => 'Courses', 'url' => '/courses'],
            ['label' => 'Edit Courses : ' . $this->title, 'url' => `/courses/edit/$this->slug`],
        ];
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

    public function update()
    {
        // dd($this->validate());

        try {
            $this->validate();

            if ($this->img_thumbnail) {
                $this->img_thumbnail_path = $this->img_thumbnail->store('thumbnails', 'public');
                $this->img_thumbnail = url('storage/' . $this->img_thumbnail_path);
            } else {
                $this->img_thumbnail = $this->previewThumbnail;
            }

            $this->course->update([
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

                // Find existing topic by unique criteria (e.g., slug or title)
                $existingTopic = $this->course->topics()->where('slug', $topic['slug'])->first();

                if ($existingTopic) {
                    // Update existing topic
                    $existingTopic->update($topic);
                } else {
                    // Create new topic
                    $this->course->topics()->create($topic);
                }
            }

            $this->alert('success', 'Course has been updated successfully!');
            return redirect()->route('courses');
        } catch (\Exception $e) {
            dd($e);
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.course.course-edit')->title(__('Edit Course') . ': ' . $this->title)->layout('layouts.app', ['breadcrumbData' => $this->breadcrumbData]);
    }
}
