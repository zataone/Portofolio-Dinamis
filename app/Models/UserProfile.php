<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'full_name',
        'photo',
        'bio',
        'instagram',
        'tiktok',
        'github',
        'gitlab',
        'email'
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
