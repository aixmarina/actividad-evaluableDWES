@props(['title'])
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __("$title") }}
    </h2>
</x-slot>
