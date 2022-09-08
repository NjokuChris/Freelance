<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class story_category extends Model
{
    use HasFactory;

    public function price()
    {
        return $this->hasMany(category_price::class);
    }
}
