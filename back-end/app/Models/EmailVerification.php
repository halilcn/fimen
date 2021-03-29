<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    use HasFactory;

    protected $table = 'email_verifications';
    protected $fillable = [
        'email',
        'code'
    ];

    public function deleteLastVerification(string $email): void
    {
        $this->where('email', $email)->delete();
    }

    public function createVerification(array $information): void
    {
        $this->create(
            [
                'email' => $information['email'],
                'code' => $information['code']
            ]
        );
    }

    public function checkVerification(string $email, string $code): void
    {
        $this->where(
            [
                'email' => $email,
                'code' => $code
            ]
        )
            ->firstOrFail()
            ->delete();
    }


}
