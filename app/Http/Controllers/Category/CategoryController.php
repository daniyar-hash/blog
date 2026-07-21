<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {   

        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

}
