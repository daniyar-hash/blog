<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
          
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
      

        return view('admin.posts.create', compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        dd($request->all());


        $data = $request->validated();
        $data['preview_image'] = Storage::put('/image', $data['preview_image']);
        $data['main_image'] = Storage::put('/image', $data['main_image']);

       //  dd($data);
        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Пост успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
         return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        
        $post->update($data);

        return redirect()->route('admin.posts.show', compact('post'))
        ->with('success', 'Post updated !');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
             ->with('success', 'Post deleted!');
    }
}

