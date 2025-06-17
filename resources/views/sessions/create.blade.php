<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Create Session</h2>

        <form method="POST" action="{{ route('sessions.store') }}" class="space-y-4">
            @csrf
            <input type="text" name="title" placeholder="Title" class="w-full border p-2 rounded" required>
            <textarea name="description" placeholder="Description" class="w-full border p-2 rounded" required></textarea>
            <input type="datetime-local" name="start_time" class="w-full border p-2 rounded" required>
            <input type="datetime-local" name="end_time" class="w-full border p-2 rounded" required>
            <input type="text" name="location" placeholder="Location" class="w-full border p-2 rounded">
            <input type="number" name="capacity" placeholder="Capacity" class="w-full border p-2 rounded">
            <input type="number" step="0.01" name="price" placeholder="Price (optional)" class="w-full border p-2 rounded">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>