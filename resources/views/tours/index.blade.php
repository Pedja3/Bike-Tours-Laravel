<x-layout>
    @auth
        <a href="{{ route('tours.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
            + Add New Tour
        </a>
    @endauth

    <h1 class="text-3xl font-bold mb-6">Bike Tours</h1>

    <form method="GET" action="{{ route('tours.index') }}" class="mb-6 flex">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search tours..."
            class="w-sm px-4 py-2 rounded-l-lg bg-gray-700 text-white focus:outline-none">
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-r-lg">
            Search
        </button>
    </form>

    @isset($selectedDifficulty)
        <p class="text-gray-400 mb-4">Showing {{ ucfirst($selectedDifficulty) }} tours</p>
    @endisset

    <div class="space-y-6">
        @forelse($tours as $tour)
            <x-tour-card :tour="$tour" />
        @empty
            <p>No tours found.</p>
        @endforelse
    </div>
                
    <div class="mt-6">
        {{ $tours->links() }}
    </div>
</x-layout>
