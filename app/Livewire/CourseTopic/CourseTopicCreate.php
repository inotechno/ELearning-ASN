<?php

namespace App\Livewire\CourseTopic;

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

    public function mount()
    {
        $this->typeTopics = TypeTopic::all();
        $this->addRow();
    }

    public function addRow()
    {
        array_push($this->topics, [
            'status' => '',
            'title' => '',
            'start_at' => '',
            'end_at' => '',
            'type_topic_id' => '',
            'percentage_value' => '',
            'description' => '',
            'video_url' => '',
            'document_path' => '',
            'zoom_url' => '',
        ]);

        $this->dispatch('topicsUpdated', $this->topics);
    }

    public function removeRow($index)
    {
        unset($this->topics[$index]);
        $this->topics = array_values($this->topics);
        $this->dispatch('topicsUpdated', $this->topics);
    }

    public function updatedTopics()
    {
        $this->dispatch('topicsUpdated', $this->topics);
    }

    public function render()
    {
        return view('livewire.course-topic.course-topic-create');
    }
}
