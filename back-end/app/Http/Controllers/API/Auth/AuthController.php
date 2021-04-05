<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendEmailVerification;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Traits\Token;
use App\Traits\Image;

class AuthController extends Controller
{
    use Token, Image;

    public User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->user->checkEmail($request->input('email'));
            if ($this->user->checkPassword($request->input('password'), $user->password)) {
                throw new \Exception();
            }
            return response(['token' => $this->createToken($user)], 201);
        } catch (\Exception $e) {
            abort(401);
        }
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->user->createUser(
            array_merge(
                $request->validated(),
                [
                    'image' => $this->createDefaultProfileImage($request->input('name'), $request->input('surname'))
                ]
            )
        );
        return response(['token' => $this->createToken($user)], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ['status' => true];
    }
}
