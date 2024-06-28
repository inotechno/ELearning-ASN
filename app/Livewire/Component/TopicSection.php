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
    public $title, $start_at, $end_at, $type_topic_id, $course_id, $topic_id, $slug, $description, $video_url, $document_url, $document_path, $zoom_url, $percentage_value, $status, $success = false, $created_by, $created_at;
    public $now;

    public $file;

    protected $listeners = [
        'selectTopic' => 'selectTopic',
        'startTopic'
    ];

    public function mount()
    {
        $this->now = Carbon::now();
    }

    public function resetFields()
    {
       $this->title = '';
       $this->start_at = '';
       $this->end_at = '';
       $this->type_topic_id = '';
       $this->course_id = '';
       $this->slug = '';
       $this->description = '';
       $this->video_url = '';
       $this->document_url = '';
       $this->document_path = '';
       $this->zoom_url = '';
       $this->percentage_value = '';
       $this->status = '';
       $this->success = false;
       $this->created_by = '';
       $this->created_at = '';
    }

    public function selectTopic($id, $activity = null)
    {
        $this->resetFields();
        $this->topic = CourseTopic::find($id);
        // dd($this->topic);

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

        if (!is_null($activity) && !empty($activity)) {
            $this->success = true;

            // Check if type_topic_id is null before accessing activity file
            if (is_null($this->type_topic_id)) {
                $this->file = $activity['file'] ?? null;
            }
        }
    }

    public function uploadSPT()
    {
        $this->validate([
            'file' => 'required|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048'
        ]);

        try {
            $file = $this->file->store('documents', 'public');
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

    public function startTopic()
    {
        try {
            $this->validate([
                'topic_id' => 'required'
            ]);
            
            ParticipantActivity::create([
                'course_id' => $this->course_id,
                'course_topic_id' => $this->topic_id,
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
                } else if ($this->status == 'progress') {
                    $this->confirm('Are you sure you want to start this topic?', [
                        'icon' => 'info',
                        'position' => 'center',
                        'toast' => false,
                        'timer' => null,
                        'text' => 'If yes, click the button below!',
                        'cancel' => true,
                        'showConfirmButton' => true,
                        'showCancelButton' => true,
                        'onConfirmed' => 'startTopic',
                        'confirmButtonText' => 'Yes, Start it!',
                        'confirmButtonColor' => '#3085d6',
                        'cancelButtonColor' => '#d33',
                    ]);
                } else {
                    $this->confirm('Are you sure you want to finish this course?', [
                        'icon' => 'info',
                        'position' => 'center',
                        'toast' => false,
                        'timer' => null,
                        'text' => 'If yes, click the button below!',
                        'cancel' => true,
                        'showConfirmButton' => true,
                        'showCancelButton' => true,
                        'onConfirmed' => 'startTopic',
                        'confirmButtonText' => 'Yes, Finish it!',
                        'confirmButtonColor' => '#3085d6',
                        'cancelButtonColor' => '#d33',
                    ]);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.component.topic-section');
    }
}
