<x-layout>
    <h1 class="mb-6 text-3xl font-bold">Create New Tour</h1>
    <x-tour-form
        :action="route('tours.store')"
        method="POST"
    />
</x-layout>
