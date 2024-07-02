<?php

namespace App\Livewire\Course;

use App\Livewire\Component\Quill;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        'img_thumbnail' => 'required|image|max:5000',
        'topics.*.status' => 'required|string',
        'topics.*.title' => 'required|string|max:255',
        'topics.*.start_at' => 'required|date',
        'topics.*.end_at' => 'required|date|after_or_equal:topics.*.start_at',
        'topics.*.type_topic_id' => 'nullable',
        'topics.*.percentage_value' => 'required|min:1|max:100',
        'topics.*.description' => 'required|string',
        'topics.*.video_url' => 'nullable|required_if:topics.*.type_topic_id,1',
        'topics.*.document_path' => 'nullable|required_if:topics.*.type_topic_id,2',
        'topics.*.zoom_url' => 'nullable|required_if:topics.*.type_topic_id,3|url',
    ];

    protected $messages = [
        'title.required' => 'Judul wajib diisi.',
        'title.string' => 'Judul harus berupa teks.',
        'title.max' => 'Judul maksimal 255 karakter.',
        'category_id.required' => 'Kategori wajib dipilih.',
        'category_id.integer' => 'Kategori harus berupa angka.',
        'type_id.required' => 'Tipe wajib dipilih.',
        'type_id.integer' => 'Tipe harus berupa angka.',
        'description_short.required' => 'Deskripsi singkat wajib diisi.',
        'description_short.string' => 'Deskripsi singkat harus berupa teks.',
        'description_short.max' => 'Deskripsi singkat maksimal 255 karakter.',
        'description.required' => 'Deskripsi wajib diisi.',
        'description.string' => 'Deskripsi harus berupa teks.',
        'implementation_start.required' => 'Tanggal mulai implementasi wajib diisi.',
        'implementation_start.date' => 'Tanggal mulai implementasi harus berupa tanggal.',
        'implementation_end.required' => 'Tanggal selesai implementasi wajib diisi.',
        'implementation_end.date' => 'Tanggal selesai implementasi harus berupa tanggal.',
        'implementation_end.after_or_equal' => 'Tanggal selesai implementasi harus setelah atau sama dengan tanggal mulai implementasi.',
        'is_active.boolean' => 'Status harus berupa true atau false.',
        'img_thumbnail.required' => 'Thumbnail gambar wajib diunggah.',
        'img_thumbnail.image' => 'Thumbnail harus berupa file gambar.',
        'img_thumbnail.max' => 'Ukuran thumbnail tidak boleh lebih dari 1MB.',
        'topics.*.status.required' => 'Status topik wajib diisi.',
        'topics.*.status.string' => 'Status topik harus berupa teks.',
        'topics.*.title.required' => 'Judul topik wajib diisi.',
        'topics.*.title.string' => 'Judul topik harus berupa teks.',
        'topics.*.title.max' => 'Judul topik maksimal 255 karakter.',
        'topics.*.start_at.required' => 'Tanggal mulai topik wajib diisi.',
        'topics.*.start_at.date' => 'Tanggal mulai topik harus berupa tanggal.',
        'topics.*.end_at.required' => 'Tanggal selesai topik wajib diisi.',
        'topics.*.end_at.date' => 'Tanggal selesai topik harus berupa tanggal.',
        'topics.*.end_at.after_or_equal' => 'Tanggal selesai topik harus setelah atau sama dengan tanggal mulai topik.',
        'topics.*.percentage_value.required' => 'Persentase nilai wajib diisi.',
        'topics.*.percentage_value.min' => 'Persentase nilai minimal 1.',
        'topics.*.percentage_value.max' => 'Persentase nilai maksimal 100.',
        'topics.*.description.required' => 'Deskripsi topik wajib diisi.',
        'topics.*.description.string' => 'Deskripsi topik harus berupa teks.',
        'topics.*.video_url.required_if' => 'URL video wajib diisi untuk topik dengan tipe video.',
        'topics.*.document_path.required_if' => 'Path dokumen wajib diisi untuk topik dengan tipe dokumen.',
        'topics.*.zoom_url.required_if' => 'URL Zoom wajib diisi untuk topik dengan tipe Zoom.',
        'topics.*.zoom_url.url' => 'Format URL Zoom tidak valid.',
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
        // dd($topics);
        $this->topics = $topics;
    }

    public function updatedImgThumbnail()
    {
        $this->validate([
            'img_thumbnail' => 'image|max:5000', // Validasi untuk gambar maksimal 1MB
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
                if (isset($topic['document_path']) && !is_null($topic['document_path'])) {
                    $filePath = str_replace('temp/', '', $topic['document_path']);
                    Storage::disk('public')->move($topic['document_path'], 'documents/' . $filePath);
                    $topic['document_path'] = 'documents/' . $filePath;
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
