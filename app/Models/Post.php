<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{

        use SoftDeletes;

        protected $fillable = ['title', 'content', 'category_id', 'preview_image', 'main_image' ];


        public function tags(): BelongsToMany
        
        {
                return $this->belongsToMany(Tag::class);
        }

        public function likedUsers()
    
        {

           return $this->belongsToMany(User::class, 'post_user_likes'); // связь многие ко многим

        }

        public function category()
        {
                return $this->belongsTo(Category::class, 'category_id', 'id'); // связь один ко многим 
        }

    

}
