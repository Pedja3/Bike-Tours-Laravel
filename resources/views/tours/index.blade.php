<x-layout>
    @auth
        <a
            href="{{ route('tours.create') }}"
            class="mb-4 inline-block rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
        >
            + Add New Tour
        </a>
    @endauth

    <h1 class="mb-6 text-3xl font-bold">Bike Tours</h1>

    <form
        method="GET"
        action="{{ route('tours.index') }}"
        class="mb-6 flex"
    >
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search tours..."
            class="w-sm rounded-l-lg bg-gray-700 px-4 py-2 text-white focus:outline-none"
        >
        <button
            type="submit"
            class="rounded-r-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
        >
            Search
        </button>
    </form>

    @isset($selectedDifficulty)
        <p class="mb-4 text-gray-400">Showing {{ ucfirst($selectedDifficulty) }} tours</p>
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
