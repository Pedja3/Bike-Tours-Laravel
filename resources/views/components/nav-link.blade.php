@props(['active' => false])

<a class="{{ $active ? 'bg-white/20 text-white rounded-md ' : 'text-gray-300 hover:bg-white/20 hover:text-white rounded-md ' }}rounded-md px-3 py-2 text-sm font-medium text-white"
aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>
