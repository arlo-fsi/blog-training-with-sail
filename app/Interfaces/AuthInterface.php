<?php

namespace App\Interfaces;

use App\Http\Requests\{
    ForgotPasswordRequest,
    LoginRequest,
    RegisterRequest,
    SetNewPasswordRequest
};

interface AuthInterface
{
    public function login(LoginRequest $req);

    public function register(RegisterRequest $req);
}
