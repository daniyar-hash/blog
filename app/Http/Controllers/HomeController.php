<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

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

      
        
        //dd(auth()->user()->name);
        return view('home.index', compact('posts', 'randPosts', 'popularPosts'));
    }
}
