<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'session_id' => 'required|exists:sessions,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);
        $data['learner_id'] = Auth::id();

        Review::create($data);
        return redirect()->back()->with('success', 'Review submitted.');
    }
}