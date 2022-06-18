<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags',
            'color_id' => 'required|exists:colors,id',
        ]);
        $request['slug'] = Str::slug($request->name);
        $tag = Tag::create($request->all());
        
        return redirect()->route('admin.tags.edit', compact('tag'))->with('success', 'Tag creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $colors = Color::all();
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,'.$tag->id,
            'color_id' => 'required|exists:colors,id',
        ]);
        $request['slug'] = Str::slug($request->name);
        $tag->update($request->all());
        
        return redirect()->route('admin.tags.edit', compact('tag'))->with('success', 'Tag actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag eliminado correctamente');
    }
}
