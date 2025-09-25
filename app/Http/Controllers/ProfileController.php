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
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

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
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'sometimes', // Make password optional for profile updates
                'required',  // If 'password' is present, it must be required
                'string',
                Password::min(8) // Minimum 8 characters
                    ->mixedCase() // At least one uppercase and one lowercase letter
                    ->numbers(), // At least one number
                'confirmed', // Ensures 'password' matches 'password_confirmation' field
            ],
            'actividad' => 'required|string',
            'cargo' => 'required|string',
            'vinculo' => 'required|string',
            'domicilio' => 'required|string',
            'localidad' => 'required|string',
            'telefono' => 'required|numeric',
            'cuit' => 'required|numeric|digits:11',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        if (isset($validatedData['password']) && !empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->fill($validatedData);
/* TO DO mail  */
/*         if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        } */

        $user->save();

        return Redirect::route('dashboard')->with('status', 'profile-updated');
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
