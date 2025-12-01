<x-layout>
    <h1 class="text-3xl font-bold mb-6">Edit New Tour</h1>

    <x-tour-form :tour="$tour" :action="route('tours.update', $tour->id)" method="PUT" />
</x-layout>
