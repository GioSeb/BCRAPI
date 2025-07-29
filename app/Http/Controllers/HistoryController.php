<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HistoryController extends Controller
{
    /**
     * Display the consultation history based on the user's role.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->load('role');

        $viewData = [];

        // --- Own History (for all roles) ---
        $ownHistoryQuery = History::where('user_id', $user->id);
        // Get the total count before pagination
        $viewData['ownHistoryCount'] = $ownHistoryQuery->count();
        // Get the paginated results for display
        $viewData['ownHistory'] = $ownHistoryQuery->latest()->paginate(15);


        if ($user->isMaster()) {
            // --- Master View ---
            // Load admins with their full history, and their created users with their full history.
            $viewData['admins'] = User::whereHas('role', function ($query) {
                    $query->where('slug', Role::ROLE_ADMIN);
                })
                ->withCount('history') // Get count of admin's own history
                ->with([
                    'history' => function ($query) {
                        $query->latest(); // Load all of the admin's history
                    },
                    'createdUsers' => function ($query) {
                        $query->withCount('history') // Get count for each created user
                              ->with(['history' => function ($subQuery) {
                                  $subQuery->latest(); // Load all history for each created user
                              }]);
                    }
                ])
                ->get();

        } elseif ($user->isAdmin()) {
            // --- Admin View ---
            // Load the users created by this admin, with their full history.
            $viewData['createdUsers'] = $user->createdUsers()
                ->withCount('history') // Get a count of consultations for each user
                ->with(['history' => function ($query) {
                    $query->latest(); // Load all history records for each user
                }])
                ->get();
        }

        // The view name from your file is 'historial.blade.php'
        return view('historial', $viewData);
    }
}
