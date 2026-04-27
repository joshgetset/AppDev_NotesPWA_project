@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">

    <!-- Header with Back to Login button -->
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Notes App</h1>

        <a href="{{ route('login') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-700 hover:-translate-y-1 transition-transform transition-colors duration-200">
            Back to Login
        </a>
    </div>

    <!-- Go to Note Page Button -->
    <a href="{{ route('note.page') }}"
       class="inline-block mb-6 bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 hover:-translate-y-1 transition-transform transition-colors duration-200">
        Go to Note Page
    </a>

    <!-- Add Note Form -->
    <form method="POST" action="/notes" class="mb-4 space-y-2">
        @csrf
        <input name="title" placeholder="Title"
            class="w-full border p-2 rounded">

        <textarea name="content" placeholder="Content"
            class="w-full border p-2 rounded"></textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 hover:-translate-y-1 transition-transform transition-colors duration-200">
            Add Note
        </button>
    </form>

    <!-- Notes List -->
    @foreach($notes as $note)
        <div class="bg-white p-3 rounded shadow mb-2">
            <h2 class="font-bold">{{ $note->title }}</h2>
            <p>{{ $note->content }}</p>

            <form method="POST" action="/notes/{{ $note->id }}" class="mt-2">
                @csrf
                @method('DELETE')
                <button class="text-red-500 text-sm hover:underline">
                    Delete
                </button>
            </form>
        </div>
    @endforeach

</div>
@endsection
