<?php

namespace App\Http\Controllers\Api;

use App\Http\Helpers\Helper;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        // login user
        if(!Auth::attempt($request->only('email','password'))){
            Helper::sendError('Email Or Password is wroing !!!');
        }
        // send response
        return new UserResource(auth()->user());
    }
}
