<?php

namespace App\Repositories;

use App\Enums\UserRole;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\{
    CreateUserRequest,
    UpdateUserRequest
};

class UserRepository implements UserInterface
{
    public function list(Request $req)
    {
        $list = User::simplePaginate(10);
        $roles = UserRole::toArray();

        return view('user.list', compact('list', 'roles'));
    }

    public function create(CreateUserRequest $req)
    {
        $values = $req->validated();
        User::create($values);
        session()->flash('success', 'User Created');

        return redirect()->back();
    }

    public function update(UpdateUserRequest $req, User $user)
    {
        $values = $req->validated();
        if ($user->id == auth()->id() && $values['role'] != auth()->user()->role) {
            session()->flash('error', 'Unable to change your own role!');

            return redirect()->back();
        }
        $user->update($values);
        session()->flash('success', 'User Updated');

        return redirect()->back();
    }

    public function delete(User $user)
    {
        if ($user->id == auth()->id()) {
            session()->flash('error', 'Unable to delete your own account!');

            return redirect()->back();
        }
        $user->delete();
        session()->flash('success', 'User Delete');

        return redirect()->back();
    }
}
