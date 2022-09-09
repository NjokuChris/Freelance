<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class story_formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'formation'
    ];
    public function price()
    {
        return $this->hasMany(category_price::class);
    }

    public function story()
    {
        return $this->hasMany(story::class);
    }
}
