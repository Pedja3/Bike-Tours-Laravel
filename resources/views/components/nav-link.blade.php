@props(['active' => false])

<a
    class="{{ $active ? 'text-yellow-300 underline underline-offset-4 decoration-yellow-300' : 'text-gray-300 hover:text-yellow-300' }} text-md mx-4 rounded-md px-3 py-2 font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}"
    {{ $attributes }}
>
    {{ $slot }}
</a>
