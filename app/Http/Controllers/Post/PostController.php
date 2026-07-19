<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PostController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    $posts = Post::paginate(6);
    $randPosts = Post::get()->random(4);
    $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->take(4)->get();

     return view('post.index', compact('posts', 'randPosts', 'popularPosts'));
    }

    public function show(Post $post)
    {
        $date = Carbon::parse($post->cretated_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->get()
        ->take(3);

       
        return view('post.show', compact('post', 'date', 'relatedPosts'));
    }
}
