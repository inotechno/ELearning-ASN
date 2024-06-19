<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function topics()
    {
        return $this->hasMany(CourseTopic::class, 'type_topic_id');
    }
}
