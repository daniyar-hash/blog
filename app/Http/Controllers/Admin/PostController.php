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
        $tags = Tag::all();
        // dd($categories);
      

        return view('admin.posts.create', compact('categories', 'tags')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
       
        // dd($request->all());

        try{
        $data = $request->validated();
        $tagIds =  $data['tag_ids'] ?? [];
        unset($data['tag_ids']);
               
        $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/image', $data['main_image']);
        $post = Post::create($data);
        $post->tags()->attach($tagIds);
        }catch(Exception $exc){
                abort(404);
        }
      
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
        $tagIds =  $data['tag_ids'] ?? [];
        unset($data['tag_ids']);

        if($request->hasFile('preview_image')){
            if($post->preview_image){
                 Storage::disk('public')->delete($post->preview_image);
               
            }

             $data['preview_image'] = Storage::disk('public')->put('images', $request->file('preview_image'));

        } else {
            unset($data['preview_image']);
        }

          if($request->hasFile('main_image')){
            if($post->main_image){
                 Storage::disk('public')->delete($post->main_image);
               
            }

             $data['main_image'] = Storage::disk('public')->put('images', $request->file('main_image'));

        } else {
            unset($data['main_image']);
        }
        
     
                
        $post->update($data);
        $post->tags()->sync($tagIds);

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

