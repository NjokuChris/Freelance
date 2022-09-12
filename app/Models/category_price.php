<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_price extends Model
{
    use HasFactory;

    // public function formation()
    // {
    //     return $this->hasMany(story_formation::class);
    // }

    public function category()
    {
        return $this->belongsTo(story_category::class, 'category_id');
    }

    public function formation()
    {
        return $this->belongsTo(story_formation::class, 'formation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
