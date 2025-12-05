<x-layout>
    <div class="mx-auto max-w-lg space-y-6">
        <h1 class="text-3xl font-bold text-white">Contact Us</h1>

        <p class="text-white">
            Have a question or want to join our tours? Send us a message and we’ll get back to you as soon as possible.
        </p>

        @if (session('success'))
            <div class="mb-4 rounded bg-green-500 p-4 text-white">
                {{ session('success') }}
            </div>
        @endif

        <form
            action="{{ route('contact.submit') }}"
            method="POST"
            class="space-y-4"
        >
            @csrf

            <div>
                <label
                    for="name"
                    class="block font-semibold text-white"
                >Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="mt-1 w-full rounded-lg bg-gray-800 px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    autofocus
                    placeholder="Your name"
                    required
                >
            </div>

            <div>
                <label
                    for="email"
                    class="block font-semibold text-white"
                >Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="mt-1 w-full rounded-lg bg-gray-800 px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Your email"
                    required
                >
            </div>

            <div>
                <label
                    for="message"
                    class="block font-semibold text-white"
                >Message</label>
                <textarea
                    id="message"
                    name="message"
                    rows="5"
                    class="mt-1 w-full rounded-lg bg-gray-800 px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Your message"
                    required
                ></textarea>
            </div>

            <button
                type="submit"
                class="rounded-lg bg-blue-600 px-6 py-2 font-semibold text-white transition-colors hover:bg-blue-700"
            >
                Send
            </button>
        </form>

        <div class="mt-6 text-white">
            <p><strong>Address:</strong> Cyclist Street 123, Belgrade</p>
            <p><strong>Email:</strong> info@biketours.com</p>
            <p><strong>Phone:</strong> +381 60 123 4567</p>
        </div>
    </div>
</x-layout>
