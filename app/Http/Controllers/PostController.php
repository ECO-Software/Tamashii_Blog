<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        // Add pagination in variable
        if(request()->page){
            $key = 'posts' . request()->page; // If exist page, add page to key
        }else{
            $key = 'posts'; // If not exist page, add key without page
        }
        // Ask if the cache posts is empty
        if (Cache::has($key)) {
            $posts = Cache::get($key); // Get the posts from the cache
        } else {
            $posts = Post::where('status', '1')->latest('id')->paginate(8); // Get the posts from the database
            Cache::put($key, $posts); // Put the posts in the cache
        }
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $this->authorize('published', $post);
        $related = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', '1')
            ->latest('id')
            ->take(4)
            ->get();
        return view('posts.show', compact('post', 'related'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->where('status', '1')->latest('id')->paginate(5);
        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', '1')->latest('id')->paginate(5);
        return view('posts.tag', compact('posts', 'tag'));
    }
}
