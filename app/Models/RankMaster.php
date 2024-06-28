<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class, 'rank_id');
    }

    public function teachers()
    {
        return $this->hasMany(Participant::class, 'rank_id');
    }
}
