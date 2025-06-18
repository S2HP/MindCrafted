@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">My Sessions</h1>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if(auth()->user()->bookedSessions->isEmpty())
        <p class="text-gray-700">You have not added any sessions yet.</p>
    @else
        <ul class="space-y-2">
            @foreach(auth()->user()->bookedSessions as $session)
                <li class="p-4 bg-white rounded shadow flex flex-col">
                    <span class="font-semibold">{{ $session->title }}</span>
                    <span class="text-sm text-gray-600">{{ $session->description }}</span>
                    <span class="text-xs text-gray-500">Time: {{ $session->start_time }} – {{ $session->end_time }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
