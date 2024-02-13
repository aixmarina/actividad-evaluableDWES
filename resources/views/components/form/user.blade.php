@props(['edit' => false, 'user' => null])

<div class="border border-gray-200 rounded-xl p-8 bg-gray-50">
    <div>
        <x-input-label for="name">{{ __('layout.Nombre') }}</x-input-label>
        @if ($edit)
            <x-text-input id="name" type="text" class="block mt-1 w-80" name="name" :value="old('name', $user->name)" required/>
        @else
            <x-text-input id="name" type="text" class="block mt-1 w-80" name="name" required/>
        @endif
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="email">{{ __('layout.Email') }}</x-input-label>
        @if ($edit)
            <x-text-input id="email" type="email" class="block mt-1 w-80" name="email" :value="old('email', $user->email)" required />
        @else
            <x-text-input id="email" type="email" class="block mt-1 w-80" name="email" required />
        @endif
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="type">{{ __('layout.Tipo') }}</x-input-label>
        <select name="type_id" id="type_id" class="block mt-1 w-80 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @php
                $types = App\Models\Type::where('model', 'user')->get();
                if ($edit){
                    $value = $user->type ? $user->type->id : null;
                } else {
                    $value = null;
                }
            @endphp
            @foreach($types as $type)
                <option
                    value="{{ $type->id }}"
                    {{ $edit ? old('type_id') == $value ? 'selected' : '' : ''}}
                >{{ ucwords($type->name) }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="password">{{ __('layout.Contraseña') }}</x-input-label>
        <x-text-input id="password" type="password" class="block mt-1 w-80" name="password" required/>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-primary-button>{{ $edit ? __('layout.Editar') : __('layout.Añadir') }}</x-primary-button>
    </div>
</div>
