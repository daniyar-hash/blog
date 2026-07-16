<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class LikedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {   
      
        $posts = auth()->user()->likedPosts;
        // dd($posts);
        return view('personal.likeds.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.categories.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    
    {
   
        $data = $request->validated();

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно добавлено!');

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        
        $category->update($data);

        return redirect()->route('admin.categories.show', compact('category'))
        ->with('success', 'Category updated !');
        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
      //  dd($post->id);
        auth()->user()->likedPosts()->detach($post->id);
        

        return redirect()->route('personal.liked.index')
             ->with('success', 'Post deleted!');
        
    }

    // public function restore(Category $category)
    // {
    //  // Запись уже найдена благодаря ->withTrashed() в маршруте, 
    // // нам остается только вызвать метод restore()
    //          $category->restore();

     

    //     return redirect()->route('admin.categories.index')->with('success', 'Category Restore');
    // }
}
