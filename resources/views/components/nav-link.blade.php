@props(['route', 'label'])

<a href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'text-primary' : 'text-white' }} hover:text-primary">
    {{ $label }}
</a>
