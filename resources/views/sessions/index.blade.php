<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Available Sessions</h2>

        @foreach($sessions as $session)
            <div class="mb-4 p-4 border rounded-lg shadow-sm bg-white">
                <h3 class="text-xl font-semibold">{{ $session->title }}</h3>
                <p class="text-gray-600">{{ $session->description }}</p>
                <p class="text-sm text-gray-500 mt-1">
                    Time: {{ $session->start_time }} – {{ $session->end_time }} <br>
                    Location: {{ $session->location }} <br>
                    Instructor: {{ $session->user->name ?? 'Unknown' }}
                </p>
                @if(auth()->user()->role === 'learner')
                    <form method="POST" action="{{ route('bookings.store') }}" class="mt-2">
                        @csrf
                        <input type="hidden" name="session_id" value="{{ $session->id }}">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Book</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
