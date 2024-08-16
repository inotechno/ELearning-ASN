<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }

    public function activeCoursesCount()
{
    $now = now(); // Atau Carbon::now()

    return $this->courses()
        ->whereDate('implementation_start', '<=', $now)
        ->whereDate('implementation_end', '>=', $now)
        ->whereNull('deleted_at')
        ->count();
}
}
