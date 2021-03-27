<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailVerification;
use App\Models\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    public function send(Request $request)
    {
        $information = [
            'email' => 'halilc.2001"@gmail.com',  //$request->input('email'),
            'username' => 'hcan', //$request->input('username'),
            'code' => Str::random(6)
        ];

        //daha önce gönderilmişse sil!
        EmailVerification::query()
            ->where('email', $information['email'])
            ->delete();


        //code u table a kaydet
        EmailVerification::create(
            [
                'email' => $information['email'],
                'code' => $information['code']
            ]
        );

        SendEmailVerification::dispatch($information);
        return response(['status' => true], 201);
    }

    public function verify(Request $request)
    {
    }
}
