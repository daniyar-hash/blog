<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post)
    
    {
   
        auth()->user()->likedPosts()->toggle($post->id);
      
        return redirect()->back();

       
    }

 
   

}
