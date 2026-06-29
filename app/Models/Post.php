<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
        protected $fillable = ['title', 'content', 'category_id', 'preview_image', 'main_image' ];


        public function tags(): BelongsToMany
        {
                return $this->belongsToMany(Tag::class);
        }

}
