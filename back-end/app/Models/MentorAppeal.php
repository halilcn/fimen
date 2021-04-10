<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorAppeal extends Model
{
    use HasFactory;

    protected $table = 'mentor_appeal';
    protected $fillable = [
        'user_id',
        'competency_id',
        'year',
        'file',
        'linkedin',
        'company_and_position',
        'postscript'
    ];
}
