<?php

namespace App\Livewire\Component;

use App\Models\CourseTopic;
use App\Models\ParticipantActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class TopicSection extends Component
{
    use LivewireAlert, WithFileUploads;

    public $topic;
    public $title, $start_at, $end_at, $type_topic_id, $course_id, $topic_id, $slug, $description, $video_url, $document_url, $document_path, $zoom_url, $percentage_value, $status, $success, $created_by, $created_at;
    public $now;

    public $file;

    protected $listeners = [
        'selectTopic' => 'selectTopic'
    ];

    public function mount()
    {
        $this->now = Carbon::now();
    }

    public function selectTopic($id, $success)
    {
        // dd($success);
        $this->topic = CourseTopic::find($id);

        $this->title = $this->topic->title;
        $this->start_at = $this->topic->start_at;
        $this->end_at = $this->topic->end_at;
        $this->type_topic_id = $this->topic->type_topic_id;
        $this->course_id = $this->topic->course_id;
        $this->topic_id = $this->topic->id;
        $this->slug = $this->topic->slug;
        $this->description = $this->topic->description;
        $this->video_url = $this->topic->video_url;
        $this->document_url = $this->topic->document_url;
        $this->document_path = $this->topic->document_path;
        $this->zoom_url = $this->topic->zoom_url;
        $this->percentage_value = $this->topic->percentage_value;
        $this->status = $this->topic->status;
        $this->created_by = $this->topic->created_by;
        $this->success = $success;
    }

    public function uploadSPT()
    {
        $this->validate([
            'file' => 'required|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048'
        ]);

        try {
            $file = $this->file->store('public/documents');
            ParticipantActivity::create([
                'course_id' => $this->course_id,
                'course_topic_id' => $this->topic_id,
                'file' => $file,
                'progress' => $this->percentage_value,
                'participant_id' => Auth::user()->participant->id
            ]);

            $this->alert('success', 'Aktivitas Berhasil Ditambahkan');
            $this->dispatch('refreshPage');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }
    }

    public function confirmStartTopic()
    {
        // dd($this->start_at, $this->end_at, $this->now);

        if ($this->end_at < $this->now) {
            $this->alert('warning', 'Topik Sudah Kadaluarsa');
        } else if ($this->start_at > $this->now) {
            $this->alert('warning', 'Topik Belum Dimulai');
        } else {
            if ($this->success) {
                $this->alert('success', 'Topik Sudah Selesai');
            } else {
                if ($this->status == 'begin') {
                    $this->dispatch('showModalUploadFile');
                }

                $this->alert('success', 'Topik Belum Selesai');
            }
        }
    }

    public function render()
    {
        return view('livewire.component.topic-section');
    }
}
