<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class, 'institution_id');
    }
}
