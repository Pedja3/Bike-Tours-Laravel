<x-layout>
    <div class="space-y-6 max-w-lg mx-auto">
        <h1 class="text-3xl font-bold text-white">Contact Us</h1>

        <p class="text-white">
            Have a question or want to join our tours? Send us a message and we’ll get back to you as soon as possible.
        </p>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
            @csrf 

            <div>
                <label for="name" class="block text-white font-semibold">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Your name" required>
            </div>

            <div>
                <label for="email" class="block text-white font-semibold">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Your email" required>
            </div>

            <div>
                <label for="message" class="block text-white font-semibold">Message</label>
                <textarea id="message" name="message" rows="5"
                    class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Your message" required></textarea>
            </div>

            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                Send
            </button>
        </form>

        <div class="text-white mt-6">
            <p><strong>Address:</strong> Cyclist Street 123, Belgrade</p>
            <p><strong>Email:</strong> info@biketours.com</p>
            <p><strong>Phone:</strong> +381 60 123 4567</p>
        </div>
    </div>
</x-layout>
