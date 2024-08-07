<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution_id',
        'education_id',
        'rank_id',
        'front_name',
        'back_name',
        'front_title',
        'back_title',
        'nip',
        'nik',
        'birth_place',
        'birth_date',
        'gender',
        'city',
        'country',
        'address',
        'phone',
        'unit_name',
        'position'
    ];

    public function institution()
    {
        return $this->belongsTo(InstitutionMaster::class, 'institution_id');
    }

    public function education()
    {
        return $this->belongsTo(EducationMaster::class, 'education_id');
    }

    public function rank()
    {
        return $this->belongsTo(RankMaster::class, 'rank_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'participants_courses', 'participant_id', 'course_id')->withPivot('created_at');
    }

    public function activities()
    {
        return $this->hasMany(ParticipantActivity::class, 'participant_id');
    }
}
