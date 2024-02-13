@props(['name'])

<label class="block mb-3 uppercase font-bold text-sm text-gray-700"
       for="{{ $name }}"
>
    {{ ucwords($name) }}
</label>
