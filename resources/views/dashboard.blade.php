<x-app-layout>
    <div class="max-w-5xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

        @php($u = auth()->user())

        {{-- ADMIN --}}
        @if($u->isAdmin())
            <div class="grid sm:grid-cols-2 gap-4">
                <a href="{{ route('users.index') }}"
                   class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700">
                    <h3 class="text-lg font-semibold">Manage Users</h3>
                    <p class="text-sm text-gray-500">Create / delete / change roles</p>
                </a>

                <a href="{{ route('sessions.index') }}"
                   class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-700">
                    <h3 class="text-lg font-semibold">View All Sessions</h3>
                    <p class="text-sm text-gray-500">Browse every session on the platform</p>
                </a>
            </div>

        {{-- INSTRUCTOR --}}
        @elseif($u->role === 'instructor')
            <div class="space-y-2">
                <a href="{{ route('sessions.create') }}" class="text-blue-600 underline">Create a Session</a><br>
                <a href="{{ route('sessions.index') }}"   class="text-blue-600 underline">My Sessions</a>
            </div>

        {{-- LEARNER --}}
        @else
            <div class="space-y-2">
                <a href="{{ route('sessions.index') }}"  class="text-blue-600 underline">Browse Sessions</a><br>
                <a href="{{ route('bookings.index') }}" class="text-blue-600 underline">My Bookings</a>
            </div>
        @endif
    </div>
</x-app-layout>
