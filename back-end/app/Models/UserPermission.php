<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $table = 'user_permissions';
    protected $fillable = [
        'user_id',
        'cv_visible',
        'mentor_program_notify'
    ];
    public $timestamps = false;

    protected $casts = [
        'cv_visible' => 'bool',
        'mentor_program_notify' => 'bool'
    ];
}
