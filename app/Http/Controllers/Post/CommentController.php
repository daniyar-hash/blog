<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\PostStoreRequest;
use App\Models\Comment;
use App\Models\Post;


class CommentController extends Controller
{
        

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentStoreRequest $request, Post $post)
    {
        //dd($request->all());
       // dd($post);

        $data = $request->validated();
      
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;

        Comment::create($data);

        return redirect()->route('post.show', $post->id)->with('success', 'Комментарий успешно отправлен!');
    }
      

}
  
  