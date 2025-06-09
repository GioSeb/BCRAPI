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
