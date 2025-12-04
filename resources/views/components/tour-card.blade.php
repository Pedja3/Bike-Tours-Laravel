@props(['tour'])
<div class="rounded-lg bg-gray-800 p-6 shadow">
    <h2 class="text-xl font-semibold">{{ $tour->name }}</h2>
    <p class="mb-4">{{ $tour->description }}</p>
    <p class="mb-2 text-gray-400">Difficulty: {{ ucfirst($tour->difficulty) }}</p>
    <p class="mb-2 text-gray-400">Distance: {{ $tour->distance ?? 'N/A' }} km</p>
    <p class="mb-2 text-gray-400">Location: {{ $tour->location ?? 'Unknown' }}</p>
    <p class="mb-4 text-sm text-gray-400">
        Created by: {{ $tour->user?->first_name ?? 'Unknown' }} {{ $tour->user?->last_name ?? '' }}
    </p>
    {{-- Dugmad za edit/delete samo ako je ulogovani korisnik vlasnik ture --}}
    @auth
        @if (auth()->id() === $tour->user_id)
            <div class="mb-4 flex space-x-2">
                <a
                    href="{{ route('tours.edit', $tour->id) }}"
                    class="rounded bg-yellow-500 px-3 py-1 text-white hover:bg-yellow-600"
                >
                    Edit
                </a>

                <form
                    action="{{ route('tours.destroy', $tour->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this tour?');"
                >
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="rounded bg-red-600 px-3 py-1 text-white hover:bg-red-700"
                    >
                        Delete
                    </button>
                </form>
            </div>
        @endif
    @endauth
    {{-- Forma za komentarisanje i ocenjivanje --}}
    @auth
        <form
            action="{{ route('comments.store', $tour->id) }}"
            method="POST"
            class="mt-4"
        >
            @csrf
            <textarea
                name="content"
                placeholder="Napiši komentar..."
                class="w-full rounded p-2 text-black"
                required
            ></textarea>
            <label class="mt-2 block">
                Rating:
                <select
                    name="rating"
                    class="ml-2 rounded text-black"
                >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </label>
            <button
                type="submit"
                class="mt-2 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
            >
                Post
            </button>
        </form>
    @else
        <p class="mt-2 text-gray-400">Prijavi se da bi ostavio komentar i ocenu.</p>
    @endauth
    {{-- Prikaz postojećih komentara --}}
    <div class="mt-6">
        <h3 class="mb-2 text-lg font-semibold">Komentari:</h3>
        @forelse($tour->comments as $comment)
            <div class="mb-4 rounded bg-gray-700 p-3">
                <p class="text-sm text-gray-300">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</p>
                <p>{{ $comment->body }}</p>
                <p class="text-sm text-yellow-400">Ocena: {{ $comment->rating }}/5</p>
            </div>
        @empty
            <p class="text-gray-400">Nema komentara za ovu turu.</p>
        @endforelse
    </div>
</div>
