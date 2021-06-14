<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterCheckController extends Controller
{
    public User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * @param  Request  $request
     * @return bool[]|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function username(Request $request)
    {
        if ($this->user->checkUniqueUsername($request->input('username'))) {
            return ['status' => true];
        }
        return response(['status' => false], 422);
    }

    /**
     * @param  Request  $request
     * @return bool[]|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function email(Request $request)
    {
        if ($this->user->checkUniqueEmail($request->input('email'))) {
            return ['status' => true];
        }
        return response(['status' => false], 422);
    }
}
