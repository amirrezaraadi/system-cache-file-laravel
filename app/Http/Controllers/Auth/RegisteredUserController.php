<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Repository\users\userRepo;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(RegisterRequest $request , userRepo $userRepo): \Illuminate\Http\JsonResponse
    {
        $user = $userRepo->register($request->only(['name' , 'email' , 'password']));
        event(new Registered($user));
        return \response()->json(['message' => 'success register user' , 'status' => 'success' ],200);
    }
}
