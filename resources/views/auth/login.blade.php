<x-layout>
    <h1 class="mb-6 text-3xl font-bold">Login</h1>

    <form
        method="POST"
        action="{{ route('login') }}"
        class="mt-6 flex flex-col"
    >
        @csrf

        <div class="flex flex-col space-y-4">
            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                placeholder="Email"
                class="w-80 rounded bg-gray-700 p-2"
                value="{{ old('email') }}"
                autofocus
                required
            >
            @error('email')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                placeholder="Password"
                class="w-80 rounded bg-gray-700 p-2"
                required
            >
        </div>

        <button class="mt-8 w-20 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            Login
        </button>
    </form>
</x-layout>
