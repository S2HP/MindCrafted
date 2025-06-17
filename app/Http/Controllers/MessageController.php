<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::where('receiver_id', Auth::id())->get();
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);
        $data['sender_id'] = Auth::id();

        Message::create($data);
        return redirect()->back()->with('success', 'Message sent.');
    }
}