<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)

    {   


        $posts = $category->posts()->paginate(6);
      
        return view('category.post.index', compact('posts'));
    }

}
