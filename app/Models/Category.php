<?php

namespace App\Models;

use App\Http\Controllers\Post\PostController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;


    protected $fillable = ['title', 'slug'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
