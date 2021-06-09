<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\EmailVerificationController;
use App\Http\Controllers\API\Auth\MeResourceController;
use App\Http\Controllers\API\Auth\RegisterCheckController;
use App\Http\Controllers\API\Auth\MeSettingResourceController;
use App\Http\Controllers\API\CompetenceResourceController;
use App\Http\Controllers\API\MeMentorProgramResourceController;
use App\Http\Controllers\API\MeMentorProgramUserResourceController;
use App\Http\Controllers\API\MentorAppealResourceController;
use App\Http\Controllers\API\MeMentorProgramAnswerResourceController;
use App\Http\Controllers\API\MentorMenteeProgramResourceController;
use App\Http\Controllers\API\MentorProgramAppealResourceController;
use App\Http\Controllers\API\MentorProgramResourceController;
use App\Http\Controllers\API\MentorResourceController;
use App\Http\Controllers\API\NewMentorResourceController;
use App\Http\Controllers\API\UserResourceController;
use App\Http\Controllers\API\FavoriteUserResourceController;
use Illuminate\Support\Facades\Route;


Route::group(
    ['prefix' => '/v1'],
    function () {
        // ----- PUBLIC -----
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);

        Route::post('/register-check/username', [RegisterCheckController::class, 'username']);
        Route::post('/register-check/email', [RegisterCheckController::class, 'email']);

        Route::post('/email-verification-send', [EmailVerificationController::class, 'send']);
        Route::post('/email-verification-verify', [EmailVerificationController::class, 'verify']);


        // ----- AUTH -----
        Route::middleware('auth:sanctum')->group(
            function () {
                Route::group(
                    ['prefix' => '/me'],
                    function () {
                        Route::resource('/', MeResourceController::class);
                        Route::resource('/settings', MeSettingResourceController::class);
                        Route::resource('/mentor-programs', MeMentorProgramResourceController::class)->scoped(
                            [
                                'mentor_program' => 'slug'
                            ]
                        );
                        Route::resource(
                            'mentor-programs.answers',
                            MeMentorProgramAnswerResourceController::class
                        )->scoped(
                            [
                                'mentor_program' => 'slug'
                            ]
                        );
                        Route::resource(
                            'mentor-programs.users',
                            MeMentorProgramUserResourceController::class
                        )->scoped(
                            [
                                'mentor_program' => 'slug'
                            ]
                        );
                    }
                );
                Route::resource('/competencies', CompetenceResourceController::class);
                Route::resource('/mentor-appeal', MentorAppealResourceController::class);
                /*sıkıntı ?*/
                Route::resource('/mentor-programs', MentorProgramResourceController::class)->scoped(
                    [
                        'mentor_program' => 'slug'
                    ]
                );
                Route::resource('/mentor-programs-appeals', MentorProgramAppealResourceController::class);
                Route::resource('/new-mentors', NewMentorResourceController::class);
                Route::resource('/mentors', MentorResourceController::class);
                Route::resource('/user', UserResourceController::class);
                Route::resource('/favorite-users', FavoriteUserResourceController::class);
                Route::resource('/mentor-mentee-programs',MentorMenteeProgramResourceController::class);
                Route::post('/logout', [AuthController::class, 'logout']);
            }
        );
    }
);
