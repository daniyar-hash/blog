<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function __invoke()
    {
        $data = [];
    
        $data['post']      = Post::all()->count();
        $data['category'] = Category::all()->count();
        $data['user']      = User::all()->count();
        $data['tag']       = Tag::all()->count();

        

        return view('admin.dashboard', compact('data'));
    }
}
