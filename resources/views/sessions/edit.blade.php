<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Edit Session</h2>

        <form method="POST" action="{{ route('sessions.update', $session) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $session->title }}" class="w-full border p-2 rounded" required>
            <textarea name="description" class="w-full border p-2 rounded" required>{{ $session->description }}</textarea>
            <input type="datetime-local" name="start_time" value="{{ \Carbon\Carbon::parse($session->start_time)->format('Y-m-d\TH:i') }}" class="w-full border p-2 rounded">
            <input type="datetime-local" name="end_time" value="{{ \Carbon\Carbon::parse($session->end_time)->format('Y-m-d\TH:i') }}" class="w-full border p-2 rounded">
            <input type="text" name="location" value="{{ $session->location }}" class="w-full border p-2 rounded">
            <input type="number" name="capacity" value="{{ $session->capacity }}" class="w-full border p-2 rounded">
            <input type="number" step="0.01" name="price" value="{{ $session->price }}" class="w-full border p-2 rounded">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>