<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthInterface;

use App\Http\Requests\{
    LoginRequest,
    RegisterRequest
};

class AuthController extends Controller
{
    private $auth;

    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $req)
    {
        return $this->auth->login($req);
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $req)
    {
        return $this->auth->register($req);
    }
}
