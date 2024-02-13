@props(['title'])

<div class="p-6 text-gray-900 text-2xl flex justify-between">
    <p>
        {{ $slot }}
    </p>
    <x-secondary-link href="/{{ $title }}s/create"> {{ $create }} </x-secondary-link>
</div>
