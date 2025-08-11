<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')
            ->orderBy('name')
            ->get();

        return CategoryResource::collection($categories);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->withCount('posts')
            ->firstOrFail();

        return new CategoryResource($category);
    }

    public function posts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->published()
            ->with('category')
            ->latest('published_at')
            ->get();

        return PostResource::collection($posts);
    }
}
