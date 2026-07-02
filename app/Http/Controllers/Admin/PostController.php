<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Service\PostService;

class PostController extends Controller
{
        
    public function __construct(protected PostService $service) {}


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
        $tags = Tag::all();
      
      

        return view('admin.posts.create', compact('categories', 'tags')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
       
        $data = $request->validated();
        $this->service->store($data);

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
        //  dd($post->tags->toArray());

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post, $request);


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

