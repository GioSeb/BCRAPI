<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\User; // Ensure User model is imported if you're fetching by ID or using route model binding

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $validatedData = $request->validated();

        if (isset($validatedData['password']) && !empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        unset($validatedData['password']);
        unset($validatedData['password_confirmation']);

        $user->fill($validatedData);

/*         // Check if the email was changed; if so, reset email_verified_at
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
 */

        $user->save();

        return Redirect::route('select')->with('status', 'profile-updated');
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
}
