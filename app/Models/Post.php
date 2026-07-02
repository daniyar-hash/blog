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

}
