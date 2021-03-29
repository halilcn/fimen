<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\True_;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Password Mutator
    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }


    public function checkEmail(string $email): User
    {
        return $this->where('email', $email)->firstOrFail();
    }

    public function checkPassword(string $password, string $userPassword): bool
    {
        if (Hash::check($password, $userPassword)) {
            return false;
        };
        return true;
    }

    public function createUser(array $user): User
    {
        return $this->create($user);
    }
}
