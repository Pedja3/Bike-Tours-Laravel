<x-layout>
    <h1 class="mb-6 text-3xl font-bold">Edit New Tour</h1>
    <x-tour-form
        :tour="$tour"
        :action="route('tours.update', $tour->id)"
        method="PUT"
    />
</x-layout>
