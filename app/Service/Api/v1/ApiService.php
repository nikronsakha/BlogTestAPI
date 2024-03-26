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

            return response()->json([
            'message' => 'Новый пост создан.',
            'data' => $create,
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Ошибка при создании поста'], 500);
        }
    }

    public function update($ValidatedRequest ,$PostObject, $post)
    {
        try {
            DB::beginTransaction();

            $PostObject->title = $ValidatedRequest['title'];
            $PostObject->content = $ValidatedRequest['content'];

            $PostObject->save();

            DB::commit();

            return new PostResource(Post::findOrFail($post));
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Ошибка при обновлении поста'], 500);
        }
    }
}
