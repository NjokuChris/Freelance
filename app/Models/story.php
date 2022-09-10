<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class story extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(story_category::class, 'category_id');
    }

    public function formation()
    {
        return $this->belongsTo(story_formation::class, 'formation_id');
    }

    public function contributors()
    {
        return $this->belongsToMany(freelancer::class, 'story_contributors', 'freelancer_id', 'story_id')->withPivot('amount');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
