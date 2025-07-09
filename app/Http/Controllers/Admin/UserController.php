<?php
//TO DO arreglar los recursos
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail; // If sending email
use Illuminate\Support\Facades\Gate; // If using Gate inside methods directly
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
// Potentially use an Action class or Notification for cleaner email sending

class UserController extends Controller
{
    // Apply authorization middleware to all methods in this controller
    public function __construct()
    {
        // TO DO Ensure only authenticated users who pass the 'manage-users' gate can access these methods TO DO
        $this->middleware(['auth', 'can:manage-users']);
    }

    public function index()
    {
        $currentUser = Auth::user();
        $query = User::with(['role', 'creator']); // Eager load both relationships

        // Check if the current user is a Master
        if ($currentUser->role?->slug === Role::ROLE_MASTER) {
            // Master sees all users. No extra filtering needed.
            // The query as is will fetch everyone.
        } else {
            // If not a Master, they must be an Admin.
            // Admins only see users they created.
            $query->where('created_by', $currentUser->id);
        }

        // Execute the final query and paginate the results
        $users = $query->latest()->paginate(15);

        return view('admin.users.panel', ['users' => $users, 'user' => $currentUser]);
    }

    public function show(User $user){
        return view('admin.users.show', compact('user')); //TO DO better study
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
            'telefono' => 'required|string',
            'cuit' => 'required|string',
            /* 'estado' => 'required|string', */
        ]);

        // 2. Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // IMPORTANT: Always hash passwords!
            'email_verified_at' => null, // Start as not verified
            'actividad' => $request->actividad,
            'cargo' => $request->cargo,
            'vinculo' => $request->vinculo,
            'domicilio' => $request->domicilio,
            'localidad' => $request->localidad,
            'telefono' => $request->telefono,
            'cuit' => $request->cuit,
            'role_id' => 1,
            'estado' => 'Pendiente',
            'created_by' => Auth::id(), // Get the ID of the currently logged-in user
            // 'is_admin' => $request->boolean('is_admin'), // Handle setting admin status if applicable
        ]);

        // --- Password Handling ---
        // Option A (Recommended): Send a Password Reset Link (User sets their own password)
        // You would typically trigger Laravel's built-in password reset notification here.
        // $user->sendPasswordResetNotification(app('auth.password.broker')->createToken($user));
        // You might need a custom notification to explain it's the *first* login setup.

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
        // Validation rules for all fields from the form
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Ensures the email is unique, but ignores the current user's email
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // Added validation for the new fields. 'nullable' means they are optional.
            // Change to 'required' if they must be filled.
            'actividad' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'domicilio' => ['required', 'string', 'max:255'],
            'localidad' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:50'],
            'cuit' => ['required', 'string', 'max:20'],
        ],
         [
            // Custom messages for validation rules
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Por favor, ingrese un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'actividad.required' => 'El campo actividad es obligatorio.',
            'cargo.required' => 'El campo cargo es obligatorio.',
            'domicilio.required' => 'El campo domicilio es obligatorio.',
            'localidad.required' => 'El campo localidad es obligatorio.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'cuit.required' => 'El campo CUIT es obligatorio.',
        ]);

        // Update the user with the validated data
        $user->update($validatedData);

        // Redirect back to the user list with a success message
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado con éxito.');
    }

    public function destroy(User $user)
    {
         // Optional: Add checks to prevent deleting the last admin or oneself TO DO
         if ($user->id === Auth::id()) {
              return back()->with('error', 'You cannot delete yourself.');
         };
         // Add more checks as needed

         $user->delete();
         return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
