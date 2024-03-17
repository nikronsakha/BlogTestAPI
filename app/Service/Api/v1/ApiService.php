<?php

namespace App\Service\Api\v1;

use App\Http\Resources\v1\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class ApiService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $create = Post::create($data);

            DB::commit();

            return new PostResource($create);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Ошибка при создании поста'], 500);
        }
    }

    public function update($request ,$post, $Post)
    {
        try {
            DB::beginTransaction();


            $Post->name = $request['title'];
            $Post->phone = $request['content'];

            $Post->save();

            DB::commit();

            return new PostResource(Post::findOrFail($post));
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Ошибка при обновлении поста'], 500);
        }
    }
}