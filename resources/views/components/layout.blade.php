<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Tours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">

    <header class="bg-gray-900 border-b border-gray-700">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">

            <div class="flex items-center space-x-5">
                <img src="{{ asset('images/bike.png') }}" alt="Bike Logo" class="w-15 h-10">
                <a href="/" class="text-xl font-bold text-white mr-12">Bike Tours</a>
            </div>

            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-16">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    <x-nav-link href="{{ route('tours.index') }}" :active="request()->is('tours*')">Tours</x-nav-link>
                </div>
            </div>

            <div class="hidden lg:flex items-center space-x-12">

                <div id="dropdownButton" class="relative group">
                    <button class="flex items-center gap-x-1 text-sm font-semibold text-white">
                        Tours Difficulty
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-white" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="dropdownMenu" class="absolute hidden mt-2 w-48 bg-gray-800 rounded-lg shadow-lg">
                        <a href="{{ route('tours.byDifficulty', 'easy') }}"
                            class="block px-4 py-2 text-sm hover:bg-gray-700">Easy Tours</a>
                        <a href="{{ route('tours.byDifficulty', 'medium') }}"
                            class="block px-4 py-2 text-sm hover:bg-gray-700">Medium Tours</a>
                        <a href="{{ route('tours.byDifficulty', 'hard') }}"
                            class="block px-4 py-2 text-sm hover:bg-gray-700">Hard Tours</a>
                    </div>
                </div>

                <script>
                    const button = document.getElementById('dropdownButton');
                    const menu = document.getElementById('dropdownMenu');

                    button.addEventListener('click', (e) => {
                        e.stopPropagation(); // Sprečava da klik na dugme zatvori odmah
                        menu.classList.toggle('hidden'); // Otvori/zatvori meni
                    });

                    // Klik van menija zatvara dropdown
                    window.addEventListener('click', (e) => {
                        if (!menu.contains(e.target) && !button.contains(e.target)) {
                            menu.classList.add('hidden');
                        }
                    });
                </script>

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-yellow-400 hover:text-red-500 ml-4">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-gray-300 ml-4">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-gray-300 ml-4">Register</a>
                @endauth


        </nav>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

</body>

<footer class="bg-gray-900 text-white p-12 text-center space-y-12">
    <div class="space-y-8">
        <p>&copy; 2025 BikeTours</p>
    </div>

    <div class="bg-gray-900 text-white p-6 text-center flex justify-center space-x-4">
        <a href="https://instagram.com" target="_blank" class="hover:text-white">Instagram</a>
        <a href="https://facebook.com" target="_blank" class="hover:text-white">Facebook</a>
        <a href="https://tiktok.com" target="_blank" class="hover:text-white">TikTok</a>
    </div>
</footer>

</html>
