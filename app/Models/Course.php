<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'implementation_start' => 'datetime',
        'implementation_end' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'slug',
        'teacher_id',
        'category_id',
        'type_id',
        'img_thumbnail',
        'img_thumbnail_path',
        'description',
        'description_short',
        'implementation_start',
        'implementation_end',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];



    public function category()
    {
        return $this->belongsTo(CategoryCourse::class, 'category_id');
    }

    public function type()
    {
        return $this->belongsTo(TypeCourse::class, 'type_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'participants_courses', 'course_id', 'participant_id');
    }

    public function topics()
    {
        return $this->hasMany(CourseTopic::class, 'course_id');
    }

    public function activities()
    {
        return $this->hasMany(ParticipantActivity::class, 'course_id');
    }
}
