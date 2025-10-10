<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserProfile;
use App\Models\User;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the admin user
        $admin = User::where('email', 'admin@admin.com')->first();
        
        if ($admin) {
            UserProfile::create([
                'user_id' => $admin->id,
                'full_name' => 'Super Admin',
                'photo' => null, // You can add actual photo later through admin panel
                'bio' => 'Experienced developer with expertise in web development, mobile applications, and system architecture. Passionate about creating innovative solutions and leading development teams.',
                'instagram' => 'https://instagram.com/superadmin',
                'tiktok' => 'https://tiktok.com/@superadmin',
                'github' => 'https://github.com/superadmin',
                'gitlab' => 'https://gitlab.com/superadmin',
                'email' => 'admin@admin.com',
            ]);
        }
    }
}