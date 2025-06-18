@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">Create Session</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('sessions.store') }}" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <input type="text" name="title" placeholder="Title" class="w-full border p-2 rounded" required>
        <textarea name="description" placeholder="Description" class="w-full border p-2 rounded" required></textarea>
        <input type="datetime-local" name="start_time" class="w-full border p-2 rounded" required>
        <input type="datetime-local" name="end_time" class="w-full border p-2 rounded" required>
        <input type="text" name="location" placeholder="Location" class="w-full border p-2 rounded">
        <input type="number" name="capacity" placeholder="Capacity" class="w-full border p-2 rounded">
        <input type="number" step="0.01" name="price" placeholder="Price (optional)" class="w-full border p-2 rounded">
        <div class="pt-2 flex justify-center">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 font-semibold text-base shadow border border-green-700">Save</button>
        </div>
    </form>
</div>
@endsection