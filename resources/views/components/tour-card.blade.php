@props(['tour'])

<div class="p-6 bg-gray-800 rounded-lg shadow">
    <h2 class="text-xl font-semibold">{{ $tour->name }}</h2>  
    <p class="mb-4">{{ $tour->description }}</p>
    <p class="text-gray-400 mb-2">Difficulty: {{ ucfirst($tour->difficulty) }}</p>
    <p class="text-gray-400 mb-2">Distance: {{ $tour->distance ?? 'N/A' }} km</p>
    <p class="text-gray-400 mb-2">Location: {{ $tour->location ?? 'Unknown' }}</p>
    <p class="text-gray-400 text-sm mb-4">
        Created by: {{ $tour->user ? $tour->user->name : 'Unknown' }}
    </p>

    @auth
        @if (auth()->id() === $tour->user_id)
            <div class="flex space-x-2">
                <a href="{{ route('tours.edit', $tour->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                    Edit
                </a>
                <form action="{{ route('tours.destroy', $tour->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this tour?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                        Delete
                    </button>
                </form>
            </div>
        @endif
    @endauth
</div>
