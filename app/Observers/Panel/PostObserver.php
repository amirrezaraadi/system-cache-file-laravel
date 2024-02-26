<?php

namespace App\Observers\Panel;

use App\Models\Panel\Post;
use App\Service\CacheService;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    protected $name;
    public function __construct()
    {
        $this->name = 'post-index' ;
    }

    public function created(Post $post)
    {
        if (CacheService::has($this->name)){
            Cache::delete($this->name);
        }
        return true ;
    }


    public function updated(Post $post): void
    {
        //
    }


    public function deleted(Post $post): void
    {
        //
    }


    public function restored(Post $post): void
    {
        //
    }


    public function forceDeleted(Post $post): void
    {
        //
    }
}
