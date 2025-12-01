<x-layout>
    <h1 class="mb-6 text-3xl font-bold">Register</h1>

    <form method="POST" action="{{ route('register') }}" class="mt-6 flex flex-col">
        @csrf

        <div class="flex flex-col space-y-4">
            <input type="text" name="first_name" placeholder="First name" class="w-80 rounded bg-gray-700 p-2"
                value="{{ old('first_name') }}" required>
            @error('first_name')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <input type="text" name="last_name" placeholder="Last name" class="w-80 rounded bg-gray-700 p-2"
                value="{{ old('last_name') }}" required>
            @error('last_name')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <input type="email" name="email" placeholder="Email" class="w-80 rounded bg-gray-700 p-2"
                value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <input type="password" name="password" placeholder="Password" class="w-80 rounded bg-gray-700 p-2" required>
            @error('password')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                class="w-80 rounded bg-gray-700 p-2" required>

        </div>

        <button class="mt-8 w-40 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            Register
        </button>
    </form>
</x-layout>
