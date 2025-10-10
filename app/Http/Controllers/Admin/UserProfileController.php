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
        
        if (!$userProfile) {
            return redirect()->route('admin.user-profile.index')
                ->with('error', 'Profile not found. Please contact administrator.');
        }
        
        return view('admin.user-profile.edit', compact('userProfile'));
    }

    public function update(Request $request)
    {
        $userProfile = Auth::user()->userProfile;
        
        if (!$userProfile) {
            return redirect()->route('admin.user-profile.index')
                ->with('error', 'Profile not found. Please contact administrator.');
        }
        
        $request->validate([
            'full_name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|string',
            'instagram' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'gitlab' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($userProfile->photo) {
                Storage::disk('public')->delete($userProfile->photo);
            }
            $data['photo'] = $request->file('photo')->store('profile/photos', 'public');
        }

        $userProfile->update($data);

        return redirect()->route('admin.user-profile.index')
            ->with('success', 'Profile updated successfully.');
    }
}
