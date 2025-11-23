<x-layout>
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-4">{{ $tour->name }}</h1>
        <p class="text-gray-400 mb-2">Difficulty: {{ ucfirst($tour->difficulty) }}</p>
        <p class="mb-6">{{ $tour->description }}</p>

        @auth
            <a href="{{ route('tours.edit', $tour->id) }}"
                class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded mr-2">
                Edit
            </a>

            <form action="{{ route('tours.destroy', $tour->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Delete
                </button>
            </form>
        @endauth
    </div>
</x-layout>
