<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // List every user (admin-only)
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Delete a user (except yourself)
    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();
        return back()->with('success', 'User deleted.');
    }
}
