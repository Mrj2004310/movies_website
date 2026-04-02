<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name', 'genre', 'year', 'video_path', 'image_path'];

    public function getVideoPathAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function getImagePathAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
