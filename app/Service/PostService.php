<?php 

namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostUpdateRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class PostService 

{
    public function store($data){

    
        try{
                DB::beginTransaction();        
                $tagIds =  $data['tag_ids'] ?? [];
                unset($data['tag_ids']);
                    
                $data['preview_image'] = Storage::disk('public')->put('/image', $data['preview_image']);
                $data['main_image'] = Storage::disk('public')->put('/image', $data['main_image']);
                $post = Post::create($data);
                $post->tags()->attach($tagIds);
                Db::commit();
        }catch(Exception $exc){
                Db::rollBack();
                abort(500);
        }
    

    }


    public function update($data, $post, $request)
    
    {
        try{

        Db::beginTransaction();
        $tagIds =  $data['tag_ids'] ?? [];
        unset($data['tag_ids']);

        if($request->hasFile('preview_image')){
            if($post->preview_image){
                 Storage::disk('public')->delete($post->preview_image);
          }
             $data['preview_image'] = Storage::disk('public')->put('images', $request->file('preview_image'));

        }

        if($request->hasFile('main_image')){
            if($post->main_image){
                 Storage::disk('public')->delete($post->main_image);
               
                   }

            $data['main_image'] = Storage::disk('public')->put('images', $request->file('main_image'));

        } 
                            
        $post->update($data);
        $post->tags()->sync($tagIds);
        Db::commit();

        } catch(Exception $exc){
            Db::rollBack();
            abort(500);
        }

        return $post;
    }

   

}