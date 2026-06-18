<?php

use App\Models\Post;
use App\Models\Tag;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
           // $table->id();

            $table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();

            // $table->unsignedBigInteger('post_id');
            // $table->index('post_id', 'post_tag_post_idx');
            // $table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id');
            
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->primary(['post_id', 'tag_id']);

            $table->timestamps();




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
        $
    }
};
