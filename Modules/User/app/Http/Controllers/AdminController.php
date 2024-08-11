<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('user::pages.admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('user::pages.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8,confirmed',
                'role' => 'nullable|string',
            ]
        );

        $user['password'] = bcrypt($user['password']);
        $user = User::create($user);

        if ($request->has('role')) {
            $user->assignRole($request->role);
        } else {
            $user->assignRole('student');
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        return view('user::pages.admin.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'role' => 'nullable|string',
                'username' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:255',
                'bio' => 'nullable|string',
            ]
        );

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->setMeta('phone', $request->phone);
        $user->setMeta('bio', $request->bio);
        $user->save();

        $user->syncRoles($request->role);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }

    // admin profile
    public function profile()
    {
        $user = auth()->user();
        return view('user::pages.admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'username' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:255',
                'bio' => 'nullable|string',
            ]
        );

        $request->user()->fill($validated);

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

        return Redirect::route('admin.profile')->with('success', 'profile-updated');
    }
}
