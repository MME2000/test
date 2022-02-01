<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(LoginRequest $loginRequest)
    {
        $credetials = $loginRequest->only('email','password');
        if(Auth::attempt($credetials)){
            $user = auth()->user();
            return response()->json([
                'status' => true,
                'message' => 'welcome',
                'token' => $user->createToken('create')->accessToken,
            ],Response::HTTP_OK);
        }
            return response()->json([
                'status' => false,
                'message' => 'نام کاربری یا رمز عبور اشتباه است',
            ],Response::HTTP_NOT_FOUND);
    }
    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json([
            'status' => true,
            'message' => 'با موفقیت خارج شدید',
        ],Response::HTTP_OK);
    }
}
