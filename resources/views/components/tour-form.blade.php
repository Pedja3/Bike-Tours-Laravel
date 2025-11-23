@props([
    'tour' => null, // Ako je edit, prosleđujemo turu, za create će biti null
    'action', // Ruta na koju forma šalje podatke
    'method' => 'POST', // POST za create, PUT za edit
])

<form action="{{ $action }}" method="POST" class="space-y-4">
    @csrf
    @if (strtoupper($method) !== 'POST')
        @method($method)
    @endif

    @if ($errors->any())
        <div class="bg-red-600 text-white p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <label class="block mb-1 font-semibold">Name:</label>
        <input type="text" name="name" class="w-full p-2 rounded bg-gray-800 border border-gray-700"
            value="{{ old('name', $tour?->name) }}" required>
    </div>

    <div>
        <label class="block mb-1 font-semibold">Description:</label>
        <textarea name="description" class="w-full p-2 rounded bg-gray-800 border border-gray-700" required>{{ old('description', $tour?->description) }}</textarea>
    </div>

    <div>
        <label class="block mb-1 font-semibold">Difficulty:</label>
        <select name="difficulty" class="w-full p-2 rounded bg-gray-800 border border-gray-700">
            <option value="">Select difficulty</option>
            <option value="easy" {{ old('difficulty', $tour?->difficulty) == 'easy' ? 'selected' : '' }}>Easy</option>
            <option value="medium" {{ old('difficulty', $tour?->difficulty) == 'medium' ? 'selected' : '' }}>Medium
            </option>
            <option value="hard" {{ old('difficulty', $tour?->difficulty) == 'hard' ? 'selected' : '' }}>Hard</option>
        </select>
    </div>

    <div>
        <label class="block mb-1 font-semibold">Distance (km):</label>
        <input type="number" step="0.01" name="distance" value="{{ old('distance', $tour->distance ?? '') }}"
            class="w-full p-2 rounded bg-gray-800 border border-gray-700">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Location:</label>
        <input type="text" name="location" value="{{ old('location', $tour->location ?? '') }}"
            class="w-full p-2 rounded bg-gray-800 border border-gray-700">
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        {{ $tour ? 'Update Tour' : 'Create Tour' }}
    </button>
</form>
