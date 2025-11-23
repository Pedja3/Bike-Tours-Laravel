<x-layout>
    <h1 class="text-3xl font-bold mb-6">Create New Tour</h1>

    <x-tour-form :action="route('tours.store')" method="POST" />
</x-layout>
