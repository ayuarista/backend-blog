<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function scopeWithPosts($query)
    {
        return $query->whereHas('posts', function ($q) {
            $q->published();
        });
    }
}
