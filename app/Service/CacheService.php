<?php

namespace App\Service;

class CacheService
{
    public static function deleted($name)
    {
        return cache()->delete($name);
    }

    public static function has($name)
    {
        return cache()->has($name);
    }


}
