<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateUserRequest,
    UpdateUserRequest
};

interface UserInterface
{
    public function list(Request $req);

    public function create(CreateUserRequest $req);

    public function update(UpdateUserRequest $req, User $user);

    public function delete(User $user);
}
