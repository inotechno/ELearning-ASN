<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'course_id',
        'course_topic_id',
        'status',
        'file',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function courseTopic()
    {
        return $this->belongsTo(CourseTopic::class, 'course_topic_id');
    }
}
