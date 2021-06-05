<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


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
        'image',
        'image_public_id',
        'about',
        'social_media',
        'cv_path'
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
        'social_media' => 'array'
    ];

    // Password Mutator
    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function mentor(): HasOne
    {
        return $this->hasOne(Mentor::class);
    }

    public function mentee(): HasMany
    {
        return $this->hasMany(MentorMentee::class);
    }

    public function mentorAppeal(): HasOne
    {
        return $this->hasOne(MentorAppeal::class);
    }

    public function permissions(): HasOne
    {
        return $this->hasOne(UserPermission::class);
    }

    public function favoriteUsers(): HasMany
    {
        return $this->hasMany(FavoriteUser::class);
    }

    public function createUser(array $user): User
    {
        $user['name'] = $user['name'].' '.$user['surname'];
        return $this->create($user);
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

    public function isProgramOwner(int $mentorId): bool
    {
        return $mentorId == $this->mentor->id;
    }

    public function checkUniqueUsername(string $username): bool
    {
        return !$this->where('username', $username)->exists();
    }

    public function checkUniqueEmail(string $email): bool
    {
        return !$this->where('email', $email)->exists();
    }

    public function isFavoriteUser(int $id): bool
    {
        return $this->favoriteUsers()->where('favorite_user_id', $id)->exists();
    }

    public function mentorPrograms(): object
    {
        return $this->mentor->programs();
    }
}
