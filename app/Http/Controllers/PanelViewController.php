<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\View\View;
use App\Models\User;

class PanelViewController extends Controller
{
    /**
     * Show the select view.
     */
    public function index(): View
    {
        $user = Auth::user(); // Get the currently authenticated user
        // You can pass the user or specific data to the view if needed
                    // Fetch the users here
            $users = User::with('role') // Eager load roles if needed
                        ->latest()
                        ->paginate(15); //TO DO escalar paginate

            // Now $users is defined and contains the user data
            return view('panel', ['users' => $users, 'user' => $user]);
    }
}

/* TO DO Note: I noticed you have a PanelViewController and a UserController. Your admin.users route group points to UserController. The logic to fetch and display the list of users belongs in the controller that the route points to, which is UserController@index. You can remove the PanelViewController or repurpose it. */
