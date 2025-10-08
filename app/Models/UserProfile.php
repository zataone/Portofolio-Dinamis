<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'full_name',
        'photo',
        'bio',
        'instagram',
        'tiktok',
        'github',
        'gitlab',
        'email'
    ];
}
