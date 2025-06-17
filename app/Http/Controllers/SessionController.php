<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        // Learners see all sessions, instructors see their own, admins see all
        $user = Auth::user();

        if ($user->role === 'instructor') {
            $sessions = Session::where('user_id', $user->id)->get();
        } else {
            $sessions = Session::all();
        }

        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Session::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('sessions.index')->with('success', 'Session created successfully.');
    }


    public function update(Request $request, Session $session)
    {
        if (Auth::id() !== $session->user_id && Auth::user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $session->update($request->all());

        return redirect()->route('sessions.index')->with('success', 'Session updated successfully.');
    }

    public function destroy(Session $session)
    {
        if (Auth::id() !== $session->user_id && Auth::user()->role !== 'admin') {
            abort(403);
        }

        $session->delete();

        return redirect()->route('sessions.index')->with('success', 'Session deleted successfully.');
    }

    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }
}
