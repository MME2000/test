<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\repositories\RegisterRepository;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function register(RegisterRequest $registerRequest)
    {

        resolve(RegisterRepository::class)->register($registerRequest);

        return response()->json([
            'status' => true,
            'success' => 'شما با موفقیت ثبت نام شدید',
        ],Response::HTTP_CREATED);
    }
}
