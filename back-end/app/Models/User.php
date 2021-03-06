<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
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
        'password',
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

    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }

    //Me Mentor Program Appeal Users Filters Scope
    public function scopeAppealUsersWithFilters(Builder $query, Request $request): void
    {
        $query->when(
            $request->boolean('onlyUserCvUploaded', false),
            function (Builder $query) {
                $query->where('cv_path', '!=', null);
            }
        )
            ->when(
                $request->boolean('onlyIsNotMentee', false),
                function (Builder $query) {
                    $query->doesntHave('mentee');
                }
            );
    }

    public function mentor(): HasOne
    {
        return $this->hasOne(Mentor::class);
    }

    public function menteePrograms(): HasMany
    {
        return $this->hasMany(MentorMenteeProgram::class);
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
        return $this->mentor()->exists() && $mentorId == $this->mentor->id;
    }

    public function checkUserId(int $userId): bool
    {
        return $this->id == $userId;
    }

    public function isProgramMentee(int $userId): bool
    {
        return $this->checkUserId($userId);
    }

    public function isProgramMentor(int $userId): bool
    {
        return $this->checkUserId($userId);
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
