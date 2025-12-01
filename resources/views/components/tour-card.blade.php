@props(['tour'])

<div class="rounded-lg bg-gray-800 p-6 shadow">
    <a href="{{ route('tours.show', $tour->id) }}">
        <h2 class="text-xl font-semibold">{{ $tour->name }}</h2>
        <p class="mb-4">{{ $tour->description }}</p>
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
            @if (auth()->id() === $tour->user_id)
                <div class="flex space-x-2">
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
</div>
