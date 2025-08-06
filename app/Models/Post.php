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
    public function getReadingTime()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $readingTime = ceil($wordCount / 200);
        return $readingTime . ' min read';
    }
    public function scopePublished($query)
    {
        return $query->where('is_published', true)->where('published_at', '<=', now());
    }
}
