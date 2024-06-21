<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course_id',
        'type_topic_id',
        'title',
        'slug',
        'description',
        'video_url',
        'document_url',
        'document_path',
        'zoom_url',
        'start_at',
        'end_at',
        'percentage_value',
        'status',
        'created_by',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function typeTopic()
    {
        return $this->belongsTo(TypeTopic::class, 'type_topic_id');
    }

    public function activities()
    {
        return $this->hasMany(ParticipantActivity::class, 'course_topic_id');
    }
}