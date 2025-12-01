<x-layout>
    <div class="rounded-lg bg-gray-800 p-6 shadow-lg">
        <h1 class="mb-4 text-3xl font-bold">{{ $tour->name }}</h1>
        <p class="mb-6">{{ $tour->description }}</p>
        <p class="mb-2 text-gray-400">Difficulty: {{ ucfirst($tour->difficulty) }}</p>
        <p class="mb-2 text-gray-400">Distance: {{ $tour->distance ?? 'N/A' }} km</p>
        <p class="mb-2 text-gray-400">Location: {{ $tour->location ?? 'Unknown' }}</p>
        <p class="mb-4 text-sm text-gray-400">
            Created by:
            @if ($tour->user)
                {{ $tour->user->first_name }} {{ $tour->user->last_name }}
            @else
                Unknown
            @endif
        </p>

        @auth
            <a
                href="{{ route('tours.edit', $tour->id) }}"
                class="mr-2 rounded bg-yellow-600 px-4 py-2 text-white hover:bg-yellow-700"
            >
                Edit
            </a>
            <form
                action="{{ route('tours.destroy', $tour->id) }}"
                method="POST"
                class="inline"
            >
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700"
                >
                    Delete
                </button>
            </form>
        @endauth
    </div>
</x-layout>
