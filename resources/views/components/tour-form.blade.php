@props([
    'tour' => null, // Ako je edit, prosleđujem turu, za create će biti null
    'action', // Ruta na koju forma šalje podatke
    'method' => 'POST', // POST za create, PUT za edit
])
<form
    action="{{ $action }}"
    method="POST"
    class="space-y-4"
>
    @csrf
    @if (strtoupper($method) !== 'POST')
        @method($method)
    @endif

    @if ($errors->any())
        <div class="mb-4 rounded bg-red-600 p-4 text-white">
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <label class="mb-1 block font-semibold">Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            class="w-full rounded border border-gray-700 bg-gray-800 p-2"
            value="{{ old('name', $tour?->name) }}"
            required
        >
    </div>

    <div>
        <label
            for="description"
            class="mb-1 block font-semibold"
        >Description:</label>
        <textarea
            id="description"
            name="description"
            class="w-full rounded border border-gray-700 bg-gray-800 p-2"
            required
        >{{ old('description', $tour?->description) }}</textarea>
    </div>

    <div>
        <label
            for="difficulty"
            class="mb-1 block font-semibold"
        >Difficulty:</label>
        <select
            id="difficulty"
            name="difficulty"
            class="w-full rounded border border-gray-700 bg-gray-800 p-2"
            required
        >
            <option value="">Select difficulty</option>
            <option
                value="easy"
                @selected(old('difficulty', $tour?->difficulty) == 'easy')
            >Easy</option>
            <option
                value="medium"
                @selected(old('difficulty', $tour?->difficulty) == 'medium')
            >Medium</option>
            <option
                value="hard"
                @selected(old('difficulty', $tour?->difficulty) == 'hard')
            >Hard</option>
        </select>
    </div>

    <div>
        <label
            for="distance"
            class="mb-1 block font-semibold"
        >Distance (km):</label>
        <input
            type="number"
            min="0"
            step="0.01"
            id="distance"
            name="distance"
            value="{{ old('distance', $tour->distance ?? '') }}"
            class="w-full rounded border border-gray-700 bg-gray-800 p-2"
            required
        >
    </div>

    <div>
        <label
            for="location"
            class="mb-1 block font-semibold"
        >Location:</label>
        <input
            type="text"
            id="location"
            name="location"
            value="{{ old('location', $tour->location ?? '') }}"
            class="w-full rounded border border-gray-700 bg-gray-800 p-2"
            required
        >
    </div>

    <button
        type="submit"
        class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
    >
        {{ $tour ? 'Update Tour' : 'Create Tour' }}
    </button>
</form>
