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
            // ---- START DEBUGGING ----
    // This will print out every single method available on the $currentUser object and stop execution.
    dd(get_class_methods($currentUser));
    // ---- END DEBUGGING ----
        $query = User::with(['role', 'creator']); // Eager load both relationships

        // Check if the current user is a Master
        if ($currentUser->isMaster()) {
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
            /* 'password' => 'required|password', */
            /* 'role_id' => 'required|int', */
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
