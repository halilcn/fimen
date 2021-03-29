<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailVerification;
use App\Models\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    protected EmailVerification $emailVerification;

    public function __construct()
    {
        $this->emailVerification = new EmailVerification();
    }

    public function send(Request $request)
    {
        $information = [
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'code' => Str::random(6)
        ];

        $this->emailVerification->deleteLastVerification($information['email']);
        $this->emailVerification->createVerification($information);

        // Send E-mail
        SendEmailVerification::dispatch($information);

        return response(['status' => true], 201);
    }

    public function verify(Request $request)
    {
        try {
            $this->emailVerification->checkVerification($request->input('email'), $request->input('code'));
            return response(['status' => 'true']);
        } catch (\Exception $e) {
            return response(
                [
                    'message' => 'Kod yanlış girildi.',
                    'email' => $request->input('email')
                ],
                422
            );
        }
    }
}
