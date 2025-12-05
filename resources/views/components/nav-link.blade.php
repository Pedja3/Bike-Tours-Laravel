@props(['active' => false])

<a
    class="{{ $active ? 'text-white underline underline-offset-4 decoration-yellow-400' : 'text-gray-300 hover:text-white' }} text-md mx-4 rounded-md px-3 py-2 font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}
>
    {{ $slot }}
</a>
