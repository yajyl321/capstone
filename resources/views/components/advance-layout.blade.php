<x-base-layout :title="$title">
    
    <x-slot name="navbar">
        {{ $navbar ?? '' }}
    </x-slot>
    
    <x-slot name="header">
        {{ $header ?? '' }}
    </x-slot>

    <x-slot name="about">
        {{ $about ?? '' }}
    </x-slot>

    <x-slot name="carousel">
        {{ $carousel ?? '' }}
    </x-slot>

    <x-slot name="footer">
        {{ $footer ?? '' }}
    </x-slot>

    {{ $slot }}
</x-base-layout>