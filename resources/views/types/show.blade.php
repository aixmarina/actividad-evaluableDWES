<x-app-layout>
    <x-header :title="__('layout.Tipos')"/>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table.header title="type">
                {{ __('layout.detalle_tipo') }}
                <x-slot name="create">{{ __('layout.crear_nuevo_tipo') }}</x-slot>
            </x-table.header>

            <x-table.read :data="$type" title="type" :columns="[
                'id' => 'id',
               __('layout.Nombre') => 'name',
               __('layout.Modelo') => 'model',
                ]"
            />
        </div>
    </div>
</x-app-layout>
