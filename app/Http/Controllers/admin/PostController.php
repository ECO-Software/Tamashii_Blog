<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PostRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create');
        $this->middleware('can:admin.posts.edit')->only('edit');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories = \App\Models\Category::pluck('name', 'id'); // Get all categories and put them in an array
        $tags = \App\Models\Tag::all(); // Get all tags and put them in an array
        return view('admin.posts.create', compact('categories', 'tags')); // Pass the array to the view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $categories = \App\Models\Category::pluck('name', 'id'); // Get all categories and put them in an array
        $tags = \App\Models\Tag::all(); // Get all tags and put them in an array
        $request['slug'] = Str::slug($request['title']); // Create a slug from the title
        $request['user_id'] = auth()->user()->id; // Get the user id from the authenticated user
        $post = Post::create($request->all());  // Create a new post
        // If the user has selected tags, add them to the post
        if($request->file('image')){
            $url = Storage::put('posts',$request->file('image')); // Upload the image to the storage
            $post->image()->create([ // Create a new image record
                'url' => $url // Set the url to the uploaded image
            ]);
        }
        $post->tags()->sync($request->tags); // Sync the tags with the post
        return redirect()->route('admin.posts.edit', compact('post', 'categories', 'tags'))->with('success', 'Post creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $related = null;
        if ($post->category != null) {
            $related = Post::where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->latest('id')
                ->take(4)
                ->get();
        }
        return view('posts.show', compact('post', 'related'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('author', $post);
        $categories = \App\Models\Category::pluck('name', 'id');
        $tags = \App\Models\Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);
        $categories = \App\Models\Category::pluck('name', 'id');
        $tags = \App\Models\Tag::all();
        $request['slug'] = Str::slug($request['title']);
        $request['user_id'] = auth()->user()->id;
        $post->update($request->all());
        if($request->file('image')){
            $url = Storage::put('posts',$request->file('image'));
            if($post->image){
                Storage::delete($post->image->url);
                $post->image()->update([
                    'url' => $url
                ]);
            }else{
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }
        $post->tags()->sync($request->tags); 
        return redirect()->route('admin.posts.edit', compact('post', 'categories', 'tags'))->with('success', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('author', $post);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post eliminado correctamente');
    }
}
