<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Repository\users\userRepo;
use App\Service\ServiceUser;
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
        $token = $user->createToken('token-name', ['*'], now()->addWeek())->plainTextToken;
        return \response()->json(['token' => $token , 'status' => 'success' ],200);
    }

    public function check(Request $request)
    {
        $check = ServiceUser::check(auth()->id() , $request->code);
        if($check === false)
            return \response()->json(['message'=> 'data not found' , 'status' => 'error' ],401);

        return \response()->json(['message'=> 'welcome to system' , 'status' => 'success' ],200);
    }
}
