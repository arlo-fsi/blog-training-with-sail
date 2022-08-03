<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateUserRequest,
    UpdateUserRequest
};

class UserController extends Controller
{
    private $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function list(Request $req)
    {
        return $this->user->list($req);
    }

    public function create(CreateUserRequest $req)
    {
        return $this->user->create($req);
    }

    public function update(UpdateUserRequest $req, User $user)
    {
        return $this->user->update($req, $user);
    }

    public function delete(User $user)
    {
        return $this->user->delete($user);
    }
}
