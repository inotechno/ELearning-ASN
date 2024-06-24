<?php

namespace App\Livewire\CourseTopic;

use App\Models\CourseTopic;
use Livewire\Component;
use App\Models\TypeTopic;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CourseTopicCreate extends Component
{
    use WithFileUploads;

    public $topics = [];
    public $typeTopics;
    public $statuses = ['begin', 'progress', 'finish'];
    public $index = 0;
    public $add_status, $add_title, $add_start_at, $add_end_at, $add_type_topic_id, $add_percentage_value, $add_description, $add_video_url, $add_document_path, $add_zoom_url, $start_date, $start_time, $end_date, $end_time;

    public $editMode = false;
    public function mount($courseId = null)
    {
        if ($courseId) {
            $topics = CourseTopic::where('course_id', $courseId)->get();
            $this->topics = $topics->toArray();
        }

        $this->typeTopics = TypeTopic::all();
    }

    public function resetForm()
    {
        $this->reset(['add_status', 'add_title', 'add_start_at', 'add_end_at', 'add_type_topic_id', 'add_percentage_value', 'add_description', 'add_video_url', 'add_document_path', 'add_zoom_url', 'start_date', 'start_time', 'end_date', 'end_time']);
    }

    public function addRow()
    {
        if ($this->editMode) {
            $this->editMode = false;
            $this->index = count($this->topics);
        }

        $this->topics[$this->index] = [
            'status' => $this->add_status,
            'title' => $this->add_title,
            'start_at' => $this->start_date . ' ' . $this->start_time,
            'end_at' => $this->end_date . ' ' . $this->end_time,
            'type_topic_id' => $this->add_type_topic_id,
            'percentage_value' => $this->add_percentage_value,
            'description' => $this->add_description,
            'video_url' => $this->add_video_url,
            'document_path' => $this->add_document_path,
            'zoom_url' => $this->add_zoom_url,
            'slug' => Str::slug($this->add_title),
        ];

        $this->index++;
        $this->resetForm();
        $this->dispatch('topicsUpdated', $this->topics);
    }

    public function deleteTopic($index)
    {
        unset($this->topics[$index]);
        $this->topics = array_values($this->topics); // Re-index the array
        $this->dispatch('topicsUpdated', $this->topics);
    }

    public function editTopic($index)
    {
        $topic = $this->topics[$index];

        $this->add_status = $topic['status'];
        $this->add_title = $topic['title'];
        $this->start_date = explode(' ', $topic['start_at'])[0];
        $this->start_time = explode(' ', $topic['start_at'])[1];
        $this->end_date = explode(' ', $topic['end_at'])[0];
        $this->end_time = explode(' ', $topic['end_at'])[1];
        $this->add_type_topic_id = $topic['type_topic_id'];
        $this->add_percentage_value = $topic['percentage_value'];
        $this->add_description = $topic['description'];
        $this->add_video_url = $topic['video_url'];
        $this->add_document_path = $topic['document_path'];
        $this->add_zoom_url = $topic['zoom_url'];

        unset($this->topics[$index]);
        $this->topics = array_values($this->topics); // Re-index the array
        $this->index--;

        $this->editMode = true;
        $this->dispatch('topicsUpdated', $this->topics);
    }


    public function render()
    {
        return view('livewire.course-topic.course-topic-create');
    }
}
