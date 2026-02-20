<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Controller;
use App\Services\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the profile view
     */
    public function show()
    {
        $user = Auth::user();
        $title = 'My Profile';
        // Get the original variant for display
        $profileImage = $user->imageFiles()
            ->where('file_type', 'user_profile')
            ->where('image_variant', 'original')
            ->orderByRaw("FIELD(image_variant, 'original')")
            ->first();

        \Log::debug('Profile Image Query', [
            'user_id' => $user->id,
            'profileImage' => $profileImage ? $profileImage->toArray() : null
        ]);

        return view('backend.profile.index', compact('user', 'title', 'profileImage'));
    }

    /**
     * Update user profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        // Handle profile image upload using ImageManager
        if ($request->hasFile('profile_image')) {
            // Delete old profile image files from image_files table
            $user->imageFiles()->where('file_type', 'user_profile')->delete();

            // Upload new profile image and get all variants
            $uploadedImages = ImageManager::upload(
                $request->file('profile_image'),
                'user_profile',
                $user->id,
                'App\\Models\\User',
                'users'
            );

            // Check if image was uploaded successfully
            if (empty($uploadedImages)) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Profile image upload failed. Please try again.'
                    ], 422);
                }
                return redirect()->back()
                    ->with('error', 'Profile image upload failed. Please try again.');
            }
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully!'
            ]);
        }

        return redirect()->route('profile.show')
            ->with('success', 'Profile updated successfully!');
    }
}
