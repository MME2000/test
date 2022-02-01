<?php

namespace App\repositories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{
    public function register($registerRequest)
    {
        User::create([
            's_name' => $registerRequest->s_name,
            's_username' => $registerRequest->s_username,
            'email' => $registerRequest->email,
            'password' => Hash::make($registerRequest->password),
            'dt_reg_date' => Carbon::now(),
        ]);
    }
}
