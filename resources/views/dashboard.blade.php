<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 min-h-screen px-4">
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
            <div class="space-y-2">
                <a href="{{ route('sessions.create') }}"
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Create a Session</a><br>
                <a href="{{ route('sessions.index') }}"
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">My Sessions</a>
            </div>

        {{-- LEARNER --}}
        @else
            <div class="space-y-2">
                <a href="{{ route('sessions.index') }}"
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Browse Sessions</a><br>
                <a href="{{ route('bookings.index') }}"
                   class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">My Bookings</a>
            </div>
        @endif
    </div>
</x-app-layout>
