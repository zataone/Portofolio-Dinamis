<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $userProfile = Auth::user()->userProfile;
        return view('admin.user-profile.index', compact('userProfile'));
    }

    public function edit()
    {
        $userProfile = Auth::user()->userProfile;
        return view('admin.user-profile.edit', compact('userProfile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|string',
            'instagram' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'gitlab' => 'nullable|url|max:255',
        ]);

        $user = Auth::user();
        $userProfile = $user->userProfile;
        
        $data = $request->only(['full_name', 'bio', 'instagram', 'tiktok', 'github', 'gitlab']);
        $data['user_id'] = $user->id;

        if ($request->hasFile('photo')) {
            if ($userProfile && $userProfile->photo) {
                Storage::disk('public')->delete($userProfile->photo);
            }
            $data['photo'] = $request->file('photo')->store('profile/photos', 'public');
        }

        if ($userProfile) {
            $userProfile->update($data);
        } else {
            UserProfile::create($data);
        }

        return redirect()->route('admin.user-profile.index')
            ->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if current password is correct
        if (!password_verify($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'The current password is incorrect.'
            ])->withInput();
        }

        // Update password
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admin.user-profile.index')
            ->with('success', 'Password updated successfully.');
    }
}
