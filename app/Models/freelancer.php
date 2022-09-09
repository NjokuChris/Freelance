<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freelancer extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->belongsTo(unit::class, 'unit_id');
    }

    public function state()
    {
        return $this->belongsTo(state::class, 'location_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

    public function stories()
    {
        return $this->belongsToMany(story::class, 'story_contributors', 'story_id', 'freelancer_id');
    }
}
