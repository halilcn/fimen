<?php

use App\Http\Controllers\API\Auth\TokenController;
use App\Http\Controllers\API\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::group(
    ['prefix' => '/v1'],
    function () {
        // ----- PUBLIC -----
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);

        Route::post('/token', [TokenController::class, 'store']);

        // ----- AUTH -----
        Route::group(
            ['middleware' => 'api:sanctum'],
            function () {
                Route::post('/logout', [AuthController::class, 'logout']);
            }
        );
    }
);
