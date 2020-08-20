<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPostImageAttribute($value)
    {
        return Storage::exists($value) ? Storage::url($value) : $value;
    }
}
