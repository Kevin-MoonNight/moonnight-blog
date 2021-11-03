<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'can:admin']);
    }

    public function index()
    {
        return User::all()->makeVisible(['id', 'username', 'email', 'is_admin']);
    }

    public function store(CreateUserRequest $request)
    {
        $validated = $request->validated();

        //密碼加密
        $validated['password'] = Hash::make($validated['password']);

        return User::create($validated);
    }

    public function show($id)
    {
        return User::findOrFail($id)->makeVisible(['id', 'username', 'email', 'is_admin']);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validated();

        //密碼加密
        $validated['password'] = Hash::make($validated['password']);

        return $user->update($validated);
    }

    public function destory($id)
    {
        $user = User::findOrFail($id);

        return $user->delete();
    }
}
