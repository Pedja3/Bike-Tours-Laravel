@props(['tour'])
<div class="rounded-lg bg-gray-800 p-4 shadow transition hover:bg-gray-700">
    <a href="{{ route('tours.show', $tour->id) }}">
        <h2 class="mb-2 text-xl font-semibold">{{ $tour->name }}</h2>
        <p class="mb-1">{{ $tour->description }}</p>
        <p class="mb-1 text-sm text-gray-400">Difficulty: {{ ucfirst($tour->difficulty) }}</p>
        <p class="mb-1 text-sm text-gray-400">Distance: {{ $tour->distance ?? 'N/A' }} km</p>
        <p class="mb-1 text-sm text-gray-400">Location: {{ $tour->location ?? 'Unknown' }}</p>
        <p class="text-sm text-gray-400">Created by: {{ $tour->user?->first_name ?? 'Unknown' }}
            {{ $tour->user?->last_name ?? '' }}</p>
    </a>
</div>
