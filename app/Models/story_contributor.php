<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class story_contributor extends Model
{
    use HasFactory;
    protected $fillable = [
        'story_id', 'freelancer_id', 'amount'
    ];

    public function freelancer()
    {
        return $this->belongsTo(freelancer::class, 'freelancer-id');
    }

    public function story()
    {
        return $this->belongsTo(story::class, 'story_id');
    }
}
