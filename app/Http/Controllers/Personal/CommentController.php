<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentUpdateRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Service\PostService;

class CommentController extends Controller
{
        

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = auth()->user()->comments;
        // dd($comments);
                    
        return view('personal.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    
           
        return view('admin.posts.create', compact('categories', 'tags')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {


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
    public function edit(Comment $comment)
    {
        // dd($comment);
      
        return view('personal.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
       


        return redirect()->route('personal.comments.index', compact('comment'))
        ->with('success', 'Comment updated !');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('personal.comments.index')
             ->with('success', 'Comment deleted!');
    }
}

