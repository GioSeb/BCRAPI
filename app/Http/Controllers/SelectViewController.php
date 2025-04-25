<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\View\View;

class SelectViewController extends Controller
{
    /**
     * Show the select view.
     */
    public function index(): View
    {
        $user = Auth::user(); // Get the currently authenticated user
        // You can pass the user or specific data to the view if needed
        return view('select', ['user' => $user]);
    }
}
