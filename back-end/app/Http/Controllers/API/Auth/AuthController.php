<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendEmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Traits\Token;

class AuthController extends Controller
{
    use Token;

    public function login(LoginRequest $request)
    {
        $user = User::query()
            ->where('email', $request->input('email'))
            ->firstOrFail();

        if (!Hash::check($request->input('password'), $user->password)) {
            abort(401);
        }

        return [
            'token' => $this->createToken($user)
        ];
    }

    public function register(Request $request)
    {
        $user = User::create(
            [
                'name' => $request->input('name'),
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );

        return [
            'token' => $this->createToken($user)
        ];
    }

    public function logout(Request $request)
    {
    }
}
