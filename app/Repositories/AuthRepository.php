<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use App\Models\User;

use App\Http\Requests\{
    LoginRequest,
    RegisterRequest
};
use Illuminate\Support\Facades\{
    Auth,
    Hash
};

class AuthRepository implements AuthInterface
{
    public function login(LoginRequest $req)
    {
        $values = $req->validated();

        $user = User::where(['username' => $values['username']])->first();
        if (!Hash::check($values['password'], $user->password)) {
            return back()->withErrors(['password' => 'Invalid password!'])->withInput();
        }

        if (Auth::attempt($values)) {
            $req->session()->regenerate();

            return redirect()->route('management');
        }

        return back()->withInput();
    }

    public function register(RegisterRequest $req)
    {
        $values = $req->validated();

        User::firstOrCreate($values);
        session()->flash('success', 'Successfully Registered!');

        return redirect()->route('login');
    }
}
