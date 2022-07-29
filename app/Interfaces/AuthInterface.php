<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

use App\Http\Requests\{
    LoginRequest,
    RegisterRequest
};

interface AuthInterface
{
    public function login(LoginRequest $req);

    public function register(RegisterRequest $req);

    public function logout(Request $req);
}
