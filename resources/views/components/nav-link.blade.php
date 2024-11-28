@props(['route', 'label'])

<a href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'text-yellow-500' : 'text-white' }} hover:text-primary">
    {{ $label }}
</a>
