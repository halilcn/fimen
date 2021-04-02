<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeResource;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function index(Request $request)
    {
        return MeResource::make($request->user());
    }
}
