<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\StoreRequest;
use App\Http\Requests\Api\v1\UpdateRequest;
use App\Http\Resources\v1\PostResource;
use App\Models\Post;
use App\Service\Api\v1\ApiService;

class PostController extends Controller
{
    public function index()
    {
        return  PostResource::collection(Post::query()->orderBy('created_at')->paginate(10));
    }


    public function store(StoreRequest $request , ApiService $service)
    {
        $data = $request->validated();

        return $service->store($data);
    }

    public function show($post)
    {
        return new PostResource(Post::findOrFail($post));
    }


    public function update(UpdateRequest $request ,ApiService $service, $post)
    {

        $PostObject = Post::findOrFail($post);
        $ValidatedRequest=$request->validated();
        $apiServiceResult = $service->update($ValidatedRequest, $PostObject, $post);
        return $apiServiceResult;
    }


    public function delete(string $post)
    {
        Post::destroy($post);
    }
}
