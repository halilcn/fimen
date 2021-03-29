<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function index()
    {
        return [
            'user' => 'bilgiler'
        ];
    }
}
