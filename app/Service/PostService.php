<?php

namespace App\Service;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {

            DB::beginTransaction();
            if(isset($data['tags'])){
                $tags = $data['tags'];
                unset($data['tags']);
            }

            $data['image'] = Storage::disk('public')->put('/images', $data['image']);

            $post = Post::firstOrCreate($data);
            if(isset($tags)){
                $post->tags()->attach($tags);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
    public function update($id, $data)
    {
        try {
            DB::beginTransaction();
            if(isset($data['tags'])){
                $tags = $data['tags'];
                unset($data['tags']);
            }
            if(isset( $data['image'])){
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $id->update($data);
            if(isset($tags)){
                $id->tags()->sync($tags);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $id;
    }
}
