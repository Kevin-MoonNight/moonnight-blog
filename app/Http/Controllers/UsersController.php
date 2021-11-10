<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('store');
    }

    public function index()
    {
        if (Gate::denies('admin')) {
            abort(403);
        }

        return User::all()->makeVisible(['id', 'username', 'email', 'is_admin']);
    }

    public function store(CreateUserRequest $request)
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

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        return $user->update($validated);
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
        if (!Gate::any(['user', 'admin'], $user)) {
            abort(403);
        }

        return $user->delete();
    }
}
