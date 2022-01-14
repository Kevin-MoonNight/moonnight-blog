<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::filter($request->all())->paginate(10)->withQueryString();

        return view('backend.users', ['users' => $users]);
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        //密碼加密
        $validated['password'] = Hash::make($validated['password']);

        return User::create($validated);
    }

    public function show(User $user)
    {
        if (!Gate::any(['user', 'admin'], $user)) {
            abort(403);
        }

        return $user->makeVisible(['id', 'username', 'email', 'is_admin']);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update($validated);

        return redirect()->route('dashboard.users.index');
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        $validated = $request->validated();

        //密碼加密
        $validated['password'] = Hash::make($validated['password']);

        return $user->update($validated);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.users.index');
    }
}
