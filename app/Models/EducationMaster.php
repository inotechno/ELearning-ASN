<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'education_id');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class, 'education_id');
    }
}
