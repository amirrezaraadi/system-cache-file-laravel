<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Panel\Post;
use App\Repository\posts\postRepo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function __construct(public postRepo $postRepo ){}

    public function index()
    {
        return Cache::remember('post-index', now()->addMinutes(2), function () {
            return $posts = $this->postRepo->index();
        });

    }

    public function store(StorePostRequest $request)
    {
       $posts =  $this->postRepo->create($request->only([
            'title',
            'slug',
            'image',
            'content',
        ]));

        return response()->json(['message'=> 'success store posts' , 'status' => 'success' ],200);
    }


    public function show(Post $post)
    {
        //
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }


}
