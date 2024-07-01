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
    public $add_status, $add_title, $add_start_at, $add_end_at, $add_type_topic_id, $add_percentage_value, $add_description, $add_video_url, $add_document_path, $add_zoom_url, $start_date, $start_time, $end_date, $end_time, $topic_id;
    public $total_percentage_value = 0;
    public $editMode = false;

    public function mount($courseId = null)
    {
        if ($courseId) {
            $topics = CourseTopic::where('course_id', $courseId)->get();
            $this->topics = $topics->map(function ($topic) {
                $topic->topic_id = $topic->id;
                $topic->type_name = $topic->typeTopic->name ?? null;
                return $topic;
            });
            $this->total_percentage_value = $this->topics->sum('percentage_value');
            $this->topics = $this->topics->toArray();
        }

        $this->typeTopics = TypeTopic::all();
    }

    public function resetForm()
    {
        $this->reset(['add_status', 'add_title', 'add_start_at', 'add_end_at', 'add_type_topic_id', 'add_percentage_value', 'add_description', 'add_video_url', 'add_document_path', 'add_zoom_url', 'start_date', 'start_time', 'end_date', 'end_time']);
    }

    public function addRow()
    {
        $typeName = "";
        if ($this->editMode) {
            $this->index = count($this->topics);

            if ($this->add_type_topic_id) {
                $typeName = TypeTopic::where('id', $this->add_type_topic_id)->first()->name;
            }
        } else {
            if ($this->add_type_topic_id) {
                $typeName = $this->typeTopics->where('id', $this->add_type_topic_id)->first()->name;
            }
        }

        // dd($this->add_document_path);
        $tempPath = null;
        if ($this->add_document_path) {
            $tempPath = $this->add_document_path->store('temp', 'public');
        }

        // dd($typeName);
        $this->topics[$this->index] = [
            'status' => $this->add_status,
            'title' => $this->add_title,
            'start_at' => $this->start_date . ' ' . $this->start_time,
            'end_at' => $this->end_date . ' ' . $this->end_time,
            'type_topic_id' => $this->add_type_topic_id,
            'type_name' => $typeName ?? null,
            'percentage_value' => $this->add_percentage_value,
            'description' => $this->add_description,
            'video_url' => $this->add_video_url,
            'document_path' => $tempPath,
            'zoom_url' => $this->add_zoom_url,
            'slug' => Str::slug($this->add_title),
        ];

        if ($this->editMode) {
            $this->topics[$this->index]['id'] = $this->topic_id;
            $this->editMode = false;
        }

        // dd($this->topics);

        $this->total_percentage_value += $this->add_percentage_value;

        // dd($this->topics);
        $this->index++;

        $this->dispatch('topicsUpdated', $this->topics);
        $this->resetForm();
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

        $this->topic_id = $topic['id'] ?? null;
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

        $this->total_percentage_value -= $this->add_percentage_value;
        $this->editMode = true;
        $this->dispatch('topicsUpdated', $this->topics);
    }


    public function render()
    {
        return view('livewire.course-topic.course-topic-create');
    }
}
