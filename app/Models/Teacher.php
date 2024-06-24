<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'education_id',
        'front_name',
        'back_name',
        'nik',
        'gender',
        'phone',
        'address',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function education()
    {
        return $this->belongsTo(EducationMaster::class, 'education_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }
}
