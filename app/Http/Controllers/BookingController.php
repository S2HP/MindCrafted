<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::where('learner_id', Auth::id())->get();
        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'session_id' => 'required|exists:course_sessions,id',
        ]);

        $data['learner_id'] = Auth::id();
        $data['status'] = 'pending';

        Booking::create($data);

        return redirect()->back()->with('success', 'Session booked!');
    }
}