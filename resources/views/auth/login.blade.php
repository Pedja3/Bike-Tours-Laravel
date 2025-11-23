<x-layout>
    <h1 class="text-3xl font-bold mb-6">Login</h1>

    <form method="POST" action="{{ route('login') }}" class="mt-6 flex flex-col">
        @csrf

        <div class="flex flex-col space-y-4">
            <input type="email" name="email" placeholder="Email" class="w-80  p-2 bg-gray-700 rounded"
                value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <input type="password" name="password" placeholder="Password" class="w-80 p-2 bg-gray-700 rounded" required>
        </div>


        <button class="w-20 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mt-8">
            Login
        </button>
    </form>
</x-layout>
