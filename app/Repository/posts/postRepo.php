<?php
namespace App\Repository\posts ;
use App\Models\Panel\Post;

class postRepo
{
    public function index()
    {
        return Post::query()->orderByDesc('created_at')->paginate() ;
    }

    public function create($data)
    {
        return Post::query()->create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'image' => $data['image'],
            'content' => $data['content'],
            'user_id' => auth()->id(),
        ]) ;
    }

    public function getFindId($id)
    {
        return Post::query()->findOrFail($id) ;
    }

    public function update($data , $id)
    {
        $post = $this->getFindId($id);
        return Post::query()->where('id' , $id)->update([
            'title' => $data['title'] ?? $post->title,
            'slug' => $data['slug'] ?? $post->slug,
            'image' => $data['image'] ?? $post->image,
            'content' => $data['content'] ?? $post->content,
            'user_id' => auth()->id(),
        ]) ;
    }

    public function deleted($id)
    {
        return Post::query()->where('id' , $id)->delete() ;
    }
}
