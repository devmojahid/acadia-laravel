<?php

namespace Modules\User\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{

    /**
     * Display the user's profile.
     */

    public function show(Request $request): View
    {
        if ($request->user()->hasRole('admin')) {
            return view('user::pages.profile.index', [
                'user' => $request->user(),
            ]);
        }

        return view('user::pages.profile.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('user::pages.settings.profile-edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // cover_photo upload
        if ($request->hasFile('cover_photo')) {
            $cover_photo = $request->file('cover_photo');
            $cover_photo_name = $request->user()->id . '_cover_photo.' . $cover_photo->getClientOriginalExtension();
            $cover_photo->move(public_path('/uploads/users/cover_photos/' . $request->user()->id), $cover_photo_name);
            $request->user()->setMeta('cover_photo', "/uploads/users/cover_photos/" . $request->user()->id . '/' . $cover_photo_name);
        }

        // avater upload

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar_name = $request->user()->id . '_avatar.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('/uploads/users/avatars/' . $request->user()->id), $avatar_name);
            $request->user()->setMeta('avatar', "/uploads/users/avatars/" . $request->user()->id . '/' . $avatar_name);
        }

        $profile_data = [
            'phone' => $request->phone,
            'skill' => $request->skill,
            'bio' => $request->bio,
        ];

        // user set meta data
        foreach ($profile_data as $key => $value) {
            $request->user()->setMeta($key, $value);
        }

        $request->user()->save();

        return Redirect::route('student.profile.edit')->with('success', 'profile-updated');
    }

    public function socailUpdate(Request $request): RedirectResponse
    {
        $social_data = $request->validate([
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'website' => ['nullable', 'url'],
            'github' => ['nullable', 'url'],
        ]);

        // user set meta data
        foreach ($social_data as $key => $value) {
            $request->user()->setMeta($key, $value);
        }

        $request->user()->save();

        return Redirect::route('student.profile.edit')->with('success', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Display the user's password change form.
     */
    public function changePassword(Request $request): View
    {
        return view('user::pages.settings.profile-password', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's password.
     */

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed', Rules\Password::defaults()],

        ]);

        $request->user()->password = bcrypt($request->password);

        $request->user()->save();

        return Redirect::route('student.profile.change-password')->with('success', 'password-updated');
    }


    /**
     * Display the user'swithdraw form.
     */

    public function withdraw(Request $request): View
    {
        return view('user::pages.settings.profile-withdraw', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's social form.
     */

    public function social(Request $request): View
    {
        return view('user::pages.settings.profile-social', [
            'user' => $request->user(),
        ]);
    }
}
