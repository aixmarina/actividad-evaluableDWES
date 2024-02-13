@props(['edit' => false, 'type' => null])

<div class="border border-gray-200 rounded-xl p-8 bg-gray-50">
    <div>
        <x-input-label for="name">{{ __('layout.Nombre') }}</x-input-label>
        @if ($edit)
            <x-text-input id="name" type="text" class="block mt-1 w-80" name="name" :value="old('name', $type->name)" required/>
        @else
            <x-text-input id="name" type="text" class="block mt-1 w-80" name="name" required/>
        @endif
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="model">{{ __('layout.Modelo') }}</x-input-label>
        <select name="model" id="model" class="block mt-1 w-80 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @php
                if ($edit){
                    $value = $type->model ?? null;
                } else {
                    $value = null;
                }
            @endphp
            <option value="term" {{ $edit ? old('model') == $value ? 'selected' : '' : ''}}>
                {{ __('layout.Término') }}
            </option>
            <option value="user" {{ $edit ? old('model') == $value ? 'selected' : '' : ''}}>
                {{ __('layout.Usuario') }}
            </option>
        </select>
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-primary-button>{{ $edit ? __('layout.Editar') : __('layout.Añadir') }}</x-primary-button>
    </div>
</div>
