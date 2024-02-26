<?php

namespace App\Service;

class ServiceUser
{
    private static $min = 100000;
    private static $max = 999999;
    private static $prefix = 'verify_code_';

    public static function generate()
    {
        return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
    }

    public static function store($id, $code, $time)
    {
        cache()->set(
            self::$prefix . $id, $code, $time
        );
    }

    public static function get($id)
    {
        return cache()->get(self::$prefix . $id);
    }

    public static function has($id)
    {
        return cache()->has(self::$prefix . $id);
    }

    public static function delete($id)
    {
        return cache()->delete(self::$prefix . $id);
    }

    public static function getRule()
    {
        return 'required|numeric|between:' . self::$min .','. self::$max;
    }

    public static function check($id, $code)
    {
        if (self::get($id) != $code) return false;

        self::delete($id);
        return  true;
    }
}
