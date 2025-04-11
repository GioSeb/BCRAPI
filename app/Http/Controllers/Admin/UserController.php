<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail; // If sending email
use Illuminate\Support\Facades\Gate; // If using Gate inside methods directly
use Illuminate\Support\Facades\Auth;
// Potentially use an Action class or Notification for cleaner email sending

class UserController extends Controller
{
    // Apply authorization middleware to all methods in this controller
    public function __construct()
    {
        // Ensure only authenticated users who pass the 'manage-users' gate can access these methods TO DO
        /* $this->middleware(['auth', 'can:manage-users']); */
    }

    public function index()
    {
        $users = User::latest()->paginate(10); // Get users for listing
        return view('admin.users.panel', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // Add validation for is_admin if you have a checkbox/select for it
            // 'is_admin' => ['sometimes', 'boolean']
        ]);

        // 1. Generate a random password
        $randomPassword = Str::random(12); // Generate a 12-character random string

        // 2. Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($randomPassword), // IMPORTANT: Always hash passwords!
            'email_verified_at' => null, // Start as not verified
            // 'is_admin' => $request->boolean('is_admin'), // Handle setting admin status if applicable
        ]);

        // --- Password Handling ---
        // Option A (Recommended): Send a Password Reset Link (User sets their own password)
        // You would typically trigger Laravel's built-in password reset notification here.
        // $user->sendPasswordResetNotification(app('auth.password.broker')->createToken($user));
        // You might need a custom notification to explain it's the *first* login setup.

        // Option B (Less Secure - As per your initial request): Email the plain password
        // **WARNING:** Sending plain text passwords via email is a security risk.
        // If you absolutely must, ensure your email sending is secure (TLS) and inform the user
        // to change it immediately upon first login.
        // Mail::raw("Welcome! Your temporary password is: $randomPassword \nPlease change it immediately after logging in.", function ($message) use ($user) {
        //     $message->to($user->email)
        //           ->subject('Your New Account Credentials');
        // });
        // Consider creating a dedicated Mailable class for better structure.


        // Redirect after creation
        return redirect()->route('admin.users.index')->with('success', 'User created successfully. Password details sent (or reset initiated).');
    }

    // Implement edit, update, destroy methods as needed, applying authorization checks.
    // Example: update method
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
             // 'is_admin' => ['sometimes', 'boolean']
        ]);

        $userData = $request->only(['name', 'email']);
        // if ($request->has('is_admin')) { // Or however you handle updating admin status
        //     $userData['is_admin'] = $request->boolean('is_admin');
        // }

        // Do NOT update the password here unless explicitly requested via a separate mechanism
        // The user should change their own password via the profile page.

        $user->update($userData);

         return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
         // Optional: Add checks to prevent deleting the last admin or oneself TO DO
/*          if ($user->id === auth()->id()) {
              return back()->with('error', 'You cannot delete yourself.');
         } */
         // Add more checks as needed

         $user->delete();
         return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
