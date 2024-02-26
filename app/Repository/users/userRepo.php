<?php

namespace App\Repository\users ;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userRepo
{
    public function index()
    {
        return User::query() ;
    }

    public function create()
    {
        return User::query() ;
    }

    public function getFindId()
    {
        return User::query() ;
    }

    public function getFindName()
    {
        return User::query() ;
    }

    public function getFindEmail()
    {
        return User::query() ;
    }

    public function getFindToken()
    {
        return User::query() ;
    }

    public function update()
    {
        return User::query() ;
    }

    public function deleted()
    {
        return User::query() ;
    }

    public function status()
    {
        return User::query() ;
    }

    public function register($data)
    {
        return User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
