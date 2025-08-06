<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'category_id',
        'is_published',
        'published_at',
        'tags',
    ];
    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
