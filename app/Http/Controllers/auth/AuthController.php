<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected string $driverType;

    public function handleRedirect()
    {
        return Socialite::driver($this->driverType)->redirect();
    }

    public function handleCallback()
    {
        try {
            $user = Socialite::driver($this->driverType)->stateless()->user();

            $userExisted = User::whereRaw('lower(email) = ? ', Str::lower($user->email))->first();

            if (!$userExisted) {
                $userExisted = User::create([
                    'name' => $user->name,
                    'username' => $user->email,
                    'email' => $user->email,
                    'password' => Hash::make(Str::random()),
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($userExisted);

            return redirect()->to('/dashboard');
        } catch (Exception $exception) {
            dd($exception);
        }
    }
}
