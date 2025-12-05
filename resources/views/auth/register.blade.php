<x-layout>
    <h1 class="mb-6 text-3xl font-bold">Register</h1>

    <form
        method="POST"
        action="{{ route('register') }}"
        class="mt-6 flex flex-col"
    >
        @csrf

        <div class="flex flex-col space-y-4">
            <label for="first_name">First name</label>
            <input
                id="first_name"
                type="text"
                name="first_name"
                placeholder="First name"
                class="w-80 rounded bg-gray-700 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('first_name') }}"
                autofocus
                required
            >
            @error('first_name')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <label for="last_name">Last name</label>
            <input
                id="last_name"
                type="text"
                name="last_name"
                placeholder="Last name"
                class="w-80 rounded bg-gray-700 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('last_name') }}"
                required
            >
            @error('last_name')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                placeholder="Email"
                class="w-80 rounded bg-gray-700 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('email') }}"
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
                class="w-80 rounded bg-gray-700 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
            @error('password')
                <p class="text-red-400">{{ $message }}</p>
            @enderror

            <label for="password_confirmation">Confirm password</label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                class="w-80 rounded bg-gray-700 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >

        </div>

        <button class="mt-8 w-40 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            Register
        </button>
    </form>
</x-layout>
