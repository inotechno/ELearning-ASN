<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_topic_id',
        'title',
        'description',
        'file_path',
        'file_url',
        'file_type',
        'file_size',
        'file_mime',
    ];

    public function courseTopic()
    {
        return $this->belongsTo(CourseTopic::class);
    }
}
