<x-layout>
    <div class="rounded-lg bg-gray-800 p-6 shadow-lg">
        <!-- Tura info -->
        <h1 class="mb-4 text-3xl font-bold text-white">{{ $tour->name }}</h1>
        <p class="mb-6 text-gray-300">{{ $tour->description }}</p>
        <p class="mb-2 text-gray-400"><strong>Difficulty:</strong> {{ ucfirst($tour->difficulty) }}</p>
        <p class="mb-2 text-gray-400"><strong>Distance:</strong> {{ $tour->distance ?? 'N/A' }} km</p>
        <p class="mb-2 text-gray-400"><strong>Location:</strong> {{ $tour->location ?? 'Unknown' }}</p>
        <p class="mb-4 text-sm text-gray-400">
            Created by:
            @if ($tour->user)
                {{ $tour->user->first_name }} {{ $tour->user->last_name }}
            @else
                Unknown
            @endif
        </p>
        <!-- Komentari -->
        <h2 class="mb-4 mt-6 text-xl font-bold text-white">Comments</h2>
        @forelse($tour->comments as $comment)
            <div class="mb-4 rounded bg-gray-700 p-4">
                <p class="text-gray-200"><strong>{{ $comment->user->first_name }}:</strong> {{ $comment->body }}</p>
                @if ($comment->rating)
                    <p class="text-yellow-400">Rating: {{ $comment->rating }}/5</p>
                @endif
            </div>
        @empty
            <p class="text-gray-400">No comments yet.</p>
        @endforelse
        <!-- Forma za dodavanje komentara (svi ulogovani korisnici mogu komentarisati) -->
        @auth
            <form
                action="{{ route('comments.store', $tour->id) }}"
                method="POST"
                class="mt-4"
            >
                @csrf
                <textarea
                    name="body"
                    rows="3"
                    class="w-full rounded bg-gray-200 p-2 text-black"
                    placeholder="Write your comment..."
                ></textarea>
                <input
                    type="number"
                    name="rating"
                    min="1"
                    max="5"
                    class="mr-4 mt-2 rounded p-2 text-black"
                    placeholder="Rating (1-5)"
                >
                <button
                    type="submit"
                    class="mt-2 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                >Post Comment</button>
            </form>
        @endauth
        <!-- Dugmad Edit/Delete ture samo za autora ture -->
        @auth
            @if (auth()->id() === $tour->user_id)
                <div class="mt-4 flex justify-end gap-4">
                    <a
                        href="{{ route('tours.edit', $tour->id) }}"
                        class="rounded bg-blue-600 px-4 py-2 text-white"
                    >
                        Edit Tour
                    </a>
                    <form
                        action="{{ route('tours.destroy', $tour->id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700"
                        >
                            Delete Tour
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</x-layout>
