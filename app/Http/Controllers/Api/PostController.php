<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()
        ->with('category')
        ->latest('published_at')
        ->get();
        return PostResource::collection($posts);
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
        ->published()
        ->with('category')
        ->firstOrFail();
        return new PostResource($post);
    }
}
