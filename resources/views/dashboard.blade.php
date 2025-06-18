@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8 min-h-screen px-4">
    <!-- Dashboard Navigation Bar -->
    <nav class="mb-8 rounded-lg bg-green-600 px-6 py-4 flex gap-4 shadow">
        @if(auth()->user()->isAdmin())
            <a href="{{ route('users.index') }}" class="text-black font-semibold hover:underline">Manage Users</a>
            <a href="{{ route('sessions.index') }}" class="text-black font-semibold hover:underline">View All Sessions</a>
        @elseif(auth()->user()->role === 'instructor')
            <a href="{{ route('sessions.create') }}" class="text-black font-semibold hover:underline">Create a Session</a>
            <a href="{{ route('sessions.index') }}" class="text-black font-semibold hover:underline">My Sessions</a>
        @else
            <a href="{{ route('sessions.index') }}" class="text-black font-semibold hover:underline">Browse Sessions</a>
            <a href="{{ route('bookings.index') }}" class="text-black font-semibold hover:underline">My Bookings</a>
        @endif
    </nav>

    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

    @php($u = auth()->user())

    {{-- ADMIN --}}
    @if($u->isAdmin())
        <div class="grid sm:grid-cols-2 gap-4">
            <a href="{{ route('users.index') }}"
               class="p-6 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                <h3 class="text-lg font-semibold">Manage Users</h3>
                <p class="text-sm text-white/90">Create / delete / change roles</p>
            </a>

            <a href="{{ route('sessions.index') }}"
               class="p-6 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                <h3 class="text-lg font-semibold">View All Sessions</h3>
                <p class="text-sm text-white/90">Browse every session on the platform</p>
            </a>
        </div>

    {{-- INSTRUCTOR --}}
    @elseif($u->role === 'instructor')
        <div>
            <a href="{{ route('sessions.create') }}"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Create a Session</a>
            <a href="{{ route('sessions.index') }}"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 ml-2">My Sessions</a>
        </div>

    {{-- LEARNER --}}
    @elseif($u->role === 'learner')
        <div class="space-y-2">
            <a href="{{ route('sessions.index') }}"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Browse Sessions</a><br>
            <a href="{{ route('bookings.index') }}"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">My Bookings</a>
        </div>
    @endif
</div>
@endsection
